<?php

namespace App\Http\Controllers\Store\Reports;

use App\Http\Controllers\Controller;
use App\Models\Core\RecordOfVoucher;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RovController extends Controller
{
    public function index(){
        return view($this->folder.'record_of_voucher');
    }

    public function assignTechnician(){
        \request()->validate(['technician_id'=>'required|integer']);
        $rov = RecordOfVoucher::findOrFail(\request('id'));
        $rov->technician_id = \request('technician_id');
        $rov->save();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Technician assigned IV successfully']);

    }

    public function printRov(){
        $stocks = [];
      if (\request('to_voucher')){
          $date = \request('date');
          if (strpos($date, '-') !== false) {
              $travelDates = explode('-', $date);
              $startDate = Carbon::parse($travelDates[0])->startOfDay();
              $endDate = Carbon::parse($travelDates[1])->endOfDay();
              $from_voucher = \request('from_voucher');
              $to_voucher = \request('to_voucher');

              $recordOfVoucherIds = RecordOfVoucher::whereBetween('vnumber',[$from_voucher, $to_voucher])
                  ->pluck('id');

              $stocks = Stock::whereBetween('date',[$startDate, $endDate])
                  ->whereIn('record_of_voucher_id',$recordOfVoucherIds)
                  ->get();
//              dd($startDate,$endDate);
              return view($this->folder.'forms.ff7109',[
                  'stocks' => $stocks
              ]);
          }
      }
        return view($this->folder.'print_rov');
    }

    public function listRecordOfVouchers(){
        $recordOfVouchers = RecordOfVoucher::query();

        if(\request('all'))
            return $recordOfVouchers->get();
        return SearchRepo::of($recordOfVouchers)
            ->addColumn('date',function($recordOfVoucher){
                return $recordOfVoucher->created_at->toDateString();
            })
            ->addColumn('issued_by',function($recordOfVoucher){
                if ($recordOfVoucher->entry_type == 'ivtech')
                    return 'Store';
                if ($recordOfVoucher->entry_type == 'rvtech')
                    return 'Tech';
                if ($recordOfVoucher->entry_type == 'iv')
                    return 'Stores ';
                if ($recordOfVoucher->entry_type == 'rv')
                    return 'Supplier '.$recordOfVoucher->supplier?->name;
            })
            ->addColumn('issued_to',function($recordOfVoucher){
                if ($recordOfVoucher->entry_type == 'rvstore' || $recordOfVoucher->entry_type == 'rv' || $recordOfVoucher->entry_type == 'rvtech')
                    return 'Stores ';
                if ($recordOfVoucher->entry_type == 'iv' )
                    return $recordOfVoucher->supplier->name;
                if ($recordOfVoucher->entry_type == 'ivtech')
                    return 'Tech';
            })
            ->addColumn('Entry_type',function($recordOfVoucher){
                return strtoupper(substr($recordOfVoucher->entry_type,0,2));
            })
            ->addColumn('action',function($recordOfVoucher){
                $str = '';
                $json = json_encode($recordOfVoucher);
                $str.='<a href="'.url("store/reports/forms/ff7110/".$recordOfVoucher->id).'" class="btn badgeButton btn-outline-primary btn-sm" target="_blank"><i class="fa fa-eye"></i> FF 7110 Print Preview</a>';
                 if ($recordOfVoucher->entry_type == 'ivtech' && !$recordOfVoucher->technician_id)
                     $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'assignTechnician\');" class="btn badge btn-info btn-sm"> Assign Technician '.$recordOfVoucher->technician_id.'</a>';

                return $str;
            })
            ->make();
    }
}
