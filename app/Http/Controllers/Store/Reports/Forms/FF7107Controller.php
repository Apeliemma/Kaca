<?php

namespace App\Http\Controllers\Store\Reports\Forms;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FF7107Controller extends Controller
{
    public function index(){
        return view($this->folder.'ff7107');
    }

    public function stocksheet($storePartId){
        $storePart = StorePart::findOrFail($storePartId);
        $sparePartId = $storePart->spare_part_id;

        $date = \request('date');
        if (strpos($date, '-') !== false) {
            $travelDates = explode('-', $date);
            $startDate = Carbon::parse($travelDates[0])->startOfDay();
            $endDate = Carbon::parse($travelDates[1])->endOfDay();
            $stocks = Stock::whereBetween('date',[$startDate, $endDate])
                ->where('spare_part_id',$sparePartId)
                ->whereNotNull('record_of_voucher_id') // filters out stock that is still under approval
                ->get();
        }
        else
            $stocks = Stock::where('spare_part_id',$sparePartId)
                ->whereNotNull('record_of_voucher_id')
                ->get();

        return view($this->folder.'ff7107',[
            'storePart' => $storePart,
            'stocks'=>$stocks
        ]);
    }
}
