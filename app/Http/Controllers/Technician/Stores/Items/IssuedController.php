<?php

namespace App\Http\Controllers\Technician\Stores\Items;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class IssuedController extends Controller
{
    public function index(){
        return view($this->folder.'issued');
    }

    public function listIssuedItems(){
        $stocks = Stock::join('spare_parts','stocks.spare_part_id','spare_parts.id')
            ->leftJoin('store_parts','stocks.store_id','store_parts.store_id')
            ->leftJoin('stores','stores.id','store_parts.store_id')
            ->where('stocks.issue_status',StatusRepository::getIssueStatus('qm-issued'))
            ->whereNotNull('stocks.aircraft_id')
            ->select('spare_parts.part_number','store_parts.id as store_part_id','stocks.id',"stocks.issue_status",'spare_parts.serial_number','spare_parts.created_at','stores.name as store','stocks.quantity','spare_parts.description');

//        dd($stocks->get());
        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('Status',function($stock){
                return StatusRepository::getIssueStatus($stock->issue_status);
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
