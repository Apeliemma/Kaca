<?php

namespace App\Http\Controllers\Store\Reports;

use App\Http\Controllers\Controller;
use App\Models\Core\RecordOfVoucher;
use App\Models\Core\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RvListsController extends Controller
{
    public function index(){
        $stocks = [];
        $recordOfVoucherIds = RecordOfVoucher::pluck('id');

        $stocks = Stock::where('stocks.store_id',auth()->user()->store_id)
            ->whereIn('stocks.record_of_voucher_id',$recordOfVoucherIds)
            ->where('stocks.entry_type','RV')
            ->orderBy('created_at','DESC')
            ->get();

        if (\request('to_voucher'))
            $stocks = $this->searchRVLists(\request());


        return view($this->folder.'rv_lists',[
            'stocks' => $stocks
        ]);
    }

    private function searchRVLists($request){
        $date = $request->date;
        if (strpos($date, '-') !== false) {
            $travelDates = explode('-', $date);
            $startDate = Carbon::parse($travelDates[0])->startOfDay();
            $endDate = Carbon::parse($travelDates[1])->endOfDay();
            $from_voucher = $request->from_voucher;
            $to_voucher = $request->to_voucher;

            $recordOfVoucherIds = RecordOfVoucher::whereBetween('vnumber',[$from_voucher, $to_voucher])
                ->pluck('id');


            $stocks = Stock::whereBetween('stocks.date',[$startDate, $endDate])
                ->whereIn('stocks.record_of_voucher_id',$recordOfVoucherIds)
                ->where('stocks.store_id',auth()->user()->store_id)
                ->where('stocks.entry_type','RV')
                ->get();
            return $stocks;
        }

        return [];
    }
}
