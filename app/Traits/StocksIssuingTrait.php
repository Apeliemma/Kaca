<?php

namespace App\Traits;

use App\Models\Core\RecordOfVoucher;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\StatusRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait StocksIssuingTrait
{
    protected $openingQuantity;
    protected $quantity;
    private $message;

    public function decrementStockQuantity($stockID)
    {
        $stock = Stock::findOrFail($stockID);
        $this->message = 'DECR Stock ID '.$stock->id;
        DB::beginTransaction();
        //TODO increment/decrement stock by stores
        $stockQuantity = $stock->quantity;
        $this->stockQuantity = $stockQuantity;

        $storePart = StorePart::where([
            ['store_id', $stock->store_id],
            ['spare_part_id', $stock->spare_part_id]
        ])->first();

        if ($stock->state == 'serviceable' && $storePart->svc_quantity < $stockQuantity ||
            $stock->state == 'unserviceable' && $storePart->unsvc_quantity < $stockQuantity
        ) {
            return ['type' => 'error', 'message' => 'The Quantity Requested exceeds Stocks Quantity'];
        }

        $this->decrementStoreParts($stock);

        $balanceInStock = $stock->state == 'serviceable' ? $storePart->svc_quantity : $storePart->unsvc_quantity;

        $stock->issue_status = StatusRepository::getIssueStatus('qm-issued');
        $stock->issued_by = auth()->id();
        $stock->date = Carbon::now()->toDateTimeString();
        $stock->save();

        $recordOfVoucherId = null; // For TL items
        if ($stock->account_issued == 'supplier') {
            $recordOfVoucherId = $this->generateSupplierIssueIvNumber($stock);
        }

        if ($stock->account_issued == 'technician' && $stock->issue_type == 'NML') {
            $recordOfVoucherId = $this->generateTechnicianIssueIvNumber($stock);
        }

        $stock->record_of_voucher_id = $recordOfVoucherId;
        $stock->save();

        Log::channel('system')->info($this->message);

        $stock->stockRecordSheet()->create([
            'user_id' => auth()->id(),
            'balance_in_stock' => $balanceInStock,
            'quantity' => $stockQuantity,
        ]);
        DB::commit();

        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock Issued successfully']);

    }

    /*
 * Creates store part entry of it does not exist in the DB
 */
    private function decrementStoreParts($stock)
    {
        $storePart = StorePart::where([
            ['store_id', $stock->store_id],
            ['spare_part_id', $stock->spare_part_id]
        ])->first();

        return $this->setQuantity($storePart, $stock);
    }

    /*
 * Sets store item quantity
 */
    private function setQuantity($storePart, $stock)
    {
        DB::beginTransaction();
        $stockQuantity = $stock->quantity;
        $storePart->quantity -= $stockQuantity;
        if ($stock->state == 'serviceable') {
            $storePart->svc_quantity -= $stockQuantity;
            $this->message .= $stock->id.' svc quantity decremented from #'.$storePart->svc_quantity.'# to #'.$stockQuantity.'# by user '.auth()->id();

        } else {
            $storePart->unsvc_quantity -= $stockQuantity;
            $this->message .= $stock->id.' usvc quantity decremented from #'.$storePart->unsvc_quantity.'# to #'.$stockQuantity.'# by user '.auth()->id();
        }
        $storePart->save();
        DB::commit();
        return $storePart;
    }

    private function generateSupplierIssueIvNumber($stock)
    {
        $supplierVouchers = RecordOfVoucher::where([
            ['supplier_id', $stock->issued_to],
            ['user_id', auth()->id()]
        ])
            ->whereDate('created_at', Carbon::now()->toDateString())
            ->get();

        if ($supplierVouchers->isEmpty()) {
            $maxRVVoucherNumber = RecordOfVoucher::whereIn('entry_type', ['iv', 'ivstore', 'ivtech'])
                ->max('vnumber');
            $newIvNumber = $maxRVVoucherNumber + 1;
            $data = [
                'user_id' => auth()->id(),
                'vnumber' => $newIvNumber,
                'entry_type' => 'iv',
                'supplier_id' => $stock->issued_to,
            ];
            $recordOfVoucher = $this->createRecordOfVoucher($data);
            $recordOfVoucherId = $recordOfVoucher->id;
        } else {
            $recordOfVoucherId = $supplierVouchers[0]['id'];
        }


        return $recordOfVoucherId;
    }

    /**
     * @param $stock
     * @param $data
     * @return mixed
     */
    private function createRecordOfVoucher($data)
    {

        return RecordOfVoucher::create($data);
    }

    private function generateTechnicianIssueIvNumber($stock)
    {
        $technicianVouchers = RecordOfVoucher::where([
            ['technician_id', $stock->user_id]
        ])
            ->whereDate('created_at', Carbon::now()->toDateString())
            ->get();

        if ($technicianVouchers->isEmpty()) {
            $maxRVVoucherNumber = RecordOfVoucher::whereIn('entry_type', ['iv', 'ivstore', 'ivtech'])
                ->max('vnumber');
            $newIvNumber = $maxRVVoucherNumber + 1;

            $data = [
                'user_id' => auth()->id(),
                'vnumber' => $newIvNumber,
                'entry_type' => 'ivtech',
                'technician_id' => $stock->user_id,
                'aircraft_id' => $stock->aircraft_id,
            ];
            $recordOfVoucher = $this->createRecordOfVoucher($data);
            $recordOfVoucherId = $recordOfVoucher->id;

        } else {
            $recordOfVoucherId = $technicianVouchers[0]['id'];
        }

        return $recordOfVoucherId;
    }

}
