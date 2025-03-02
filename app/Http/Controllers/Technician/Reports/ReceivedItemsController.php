<?php

namespace App\Http\Controllers\Technician\Reports;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class ReceivedItemsController extends Controller
{
    public function index(){
        return view($this->folder.'received_items');
    }

    public function listReceivedItems(){
        $stocks = Stock::join('spare_parts','stocks.spare_part_id','spare_parts.id')
            ->leftJoin('store_parts','stocks.store_id','store_parts.store_id')
            ->leftJoin('stores','stores.id','store_parts.store_id')
            ->where('stocks.issue_status',StatusRepository::getIssueStatus('qm-issued'))
            ->where('issued_to',auth()->id())
            ->whereNotNull('stocks.aircraft_id')
            ->select('spare_parts.part_number','stocks.id','stocks.date','store_parts.id as store_part_id','spare_parts.serial_number','stores.name as store','stocks.*','spare_parts.description');

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
                $str.='&nbsp;&nbsp;<a href="'.url("technician/stores/items/".$stock->id.'/printff890').'" class="btn badgeButton btn-outline-primary btn-sm" target="_parent"><i class="fa fa-eye"></i> View FF 890A</a>';
                return $str;
            })
            ->make();
    }
}
