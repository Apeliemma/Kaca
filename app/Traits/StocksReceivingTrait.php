<?php

namespace App\Traits;

use App\Models\Core\RecordOfVoucher;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\StatusRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait StocksReceivingTrait
{
    private $message;
    public function updateStockQuantity($stockID){
        $stock = Stock::findOrFail($stockID);
        $this->message = 'INCR Stock ID '.$stock->id;

        $stockQuantity = $stock->quantity;
        DB::beginTransaction();

        $storePart = $this->updateStoreParts($stock);

        $balanceInStock = $stock->state == 'serviceable' ? $storePart->svc_quantity : $storePart->unsvc_quantity;

        $stock->receive_status = StatusRepository::getReceiveStatus('received');
        $stock->received_by = auth()->id();
        $stock->store_id = auth()->user()->store_id;
        $stock->date = Carbon::now()->toDateTimeString();
        $stock->save();

        // do not generate RV number for items on Temporary Loan
        if ( $stock->issue_type == 'TL' ){
            DB::commit();
            $this->message .= ' on TLOAN';
            return true;
        }

        // if stock has supplier_id we are receiving it from supplier
        if ($stock->supplier_id)
            $recordOfVoucherId = $this->generateSupplierRvNumber($stock);

        if (!$stock->supplier_id)
            $recordOfVoucherId = $this->generateTechnicianRvNumber($stock);

        $stock->record_of_voucher_id = $recordOfVoucherId;
        $stock->save();
        Log::channel('system')->info($this->message);

        $stock->stockRecordSheet()->create([
            'user_id' =>  auth()->id(),
            'balance_in_stock' =>  $balanceInStock,
            'quantity' => $stockQuantity,
        ]);
        DB::commit();
    }

    /*
     * Creates store part entry of it does not exist in the DB
     */
    private function updateStoreParts($stock){
        $storePart = StorePart::where([
            ['store_id',auth()->user()->store_id],
            ['spare_part_id',$stock->spare_part_id]
        ])->first();
        if ($storePart){
           return $this->setQuantity($storePart,$stock);
        }
        $storePart = new StorePart();
        $storePart->spare_part_id = $stock->spare_part_id;
        $storePart->store_id = auth()->user()->store_id;
        $storePart->user_id = auth()->id();
        $storePart->save();

        return $this->setQuantity($storePart,$stock);
    }

    /*
     * Sets store item quantity
     */
    private function setQuantity($storePart,$stock){
        $stockQuantity = $stock->quantity;
        $storePart->quantity += $stockQuantity;
        if ($stock->state == 'serviceable'){
            $storePart->svc_quantity += $stockQuantity;
            $this->message .= $stock->id.' svc quantity incremented from #'.$storePart->svc_quantity .'# to #'.$stockQuantity.'# by user '.auth()->id();

        }
        else{
            $storePart->unsvc_quantity += $stockQuantity;
            $this->message .= $stock->id.' unsvc quantity incremented from #'.$storePart->unsvc_quantity .'# to #'.$stockQuantity.'# by user '.auth()->id();
        }
        $storePart->save();
        return $storePart;
    }


    /**
     * @param $stock
     * @return void
     * Receipts from Supplier
     */
    private function generateSupplierRvNumber($stock){
        $recordsOfVouchers = RecordOfVoucher::where([
            ['supplier_id' , $stock->supplier_id]
        ])->whereDate('created_at',Carbon::now()->toDateString())
            ->get();

        if ($recordsOfVouchers->isEmpty()){
            $maxRVVoucherNumber = DB::table('record_of_vouchers')
                ->whereIn('entry_type',['rv','rvstore','rvtech'])
                ->max('vnumber');
            $newVoucherNumber = $maxRVVoucherNumber+1;
            $data = [
                'user_id' => auth()->id(),
                'vnumber' => $newVoucherNumber,
                'entry_type' => 'rv',
                'supplier_id' => $stock->issued_by,
            ];
            $recordOfVoucher = $this->createRecordOfVoucher( $data);
            $recordOfVoucherId = $recordOfVoucher->id;

        }else
            $recordOfVoucherId = $recordsOfVouchers[0]['id'];

        return $recordOfVoucherId;
    }

    /**
     * @param $stock
     * @return void
     * Receipts from Technician
     */
    private function generateTechnicianRvNumber($stock){
        $recordsOfVouchers = RecordOfVoucher::where([
            ['aircraft_id' , $stock->aircraft_id],
        ])->whereDate('created_at',Carbon::now()->toDateString())
            ->get();

        if ($recordsOfVouchers->isEmpty()){
            $maxRVVoucherNumber = DB::table('record_of_vouchers')
                ->whereIn('entry_type',['rv','rvstore','rvtech'])
                ->max('vnumber');
            $newVoucherNumber = $maxRVVoucherNumber+1;
            $data = [
                'user_id' => auth()->id(),
                'vnumber' => $newVoucherNumber,
                'entry_type' => 'rvtech',
                'technician_id' => $stock->user_id,
                'aircraft_id' => $stock->aircraft_id,
            ];
            $recordOfVoucher = $this->createRecordOfVoucher($data);
            $recordOfVoucherId = $recordOfVoucher->id;

        }else
            $recordOfVoucherId = $recordsOfVouchers[0]['id'];

        return $recordOfVoucherId;
    }

    private function createRecordOfVoucher($data){

        return RecordOfVoucher::create($data);
    }
}
