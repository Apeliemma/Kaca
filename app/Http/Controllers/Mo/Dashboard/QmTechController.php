<?php

namespace App\Http\Controllers\Mo\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class QmTechController extends Controller
{
    public function approved(){
        return view($this->folder.'approved');
    }

    public function listApproved(){
        $stocks = Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.entry_type','IV'],
            ])->whereIn('stocks.issue_status',StatusRepository::getIssueStatus(['qm-approved','qm-declined']))
            ->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');


        if(\request('all'))
            return $stocks->get();
        return SearchRepo::of($stocks)
            ->addColumn('action',function($stock) {
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("mo/stocks/stock/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })
            ->make();
    }

    public function receipt(){
        return view($this->folder.'receipt');
    }

    public function listReceipt(){
        $stocks = Stock::join('spare_parts','stocks.spare_part_id','spare_parts.id')
            ->join('stores','stores.id','stocks.store_id')
            ->join('store_parts','store_parts.store_id','stores.id')
            ->where('stocks.issue_status',StatusRepository::getIssueStatus('qm-issued'))
            ->whereNotNull('stocks.aircraft_id')
            ->select('spare_parts.part_number','stocks.id',"store_parts.id as store_part_id",'stocks.date','spare_parts.serial_number','stores.name as store','stocks.*','spare_parts.description');

        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('entry_date',function($stock){
                return $stock->date->toDateString();
            })
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='&nbsp;&nbsp;<a href="'.url("technician/stores/items/".$stock->store_part_id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })
            ->make();
    }
}
