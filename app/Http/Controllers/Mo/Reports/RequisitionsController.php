<?php

namespace App\Http\Controllers\Mo\Reports;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class RequisitionsController extends Controller
{
    public function index(){
        return view($this->folder.'requisitions');
    }

    public function listRequisitions(){
        $stocks = Stock::join('spare_parts','stocks.spare_part_id','spare_parts.id')
            ->leftJoin('store_parts','stocks.store_id','store_parts.store_id')
            ->leftJoin('stores','stores.id','store_parts.store_id')
            ->where(function ($query){
                $query->whereIn('stocks.issue_status',StatusRepository::getIssueStatus(['processing','mo-approved','qm-approved','approved']));
            })
            ->orWhere(function ($query){
                $query->whereIn('stocks.receive_status',StatusRepository::getReceiveStatus(['processing','processed','approved']));
            })
            ->whereNotNull('stocks.aircraft_id')
            ->select('spare_parts.part_number','stocks.id','spare_parts.serial_number','stores.name as store','stocks.*','spare_parts.description');

        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('Status',function($stock){
                if ($stock->account_issued == 'store')
                    return StatusRepository::getReceiveStatus($stock->receive_status);

                return StatusRepository::getIssueStatus($stock->issue_status);
            })
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='&nbsp;&nbsp;<a href="'.url("mo/requisitions/".$stock->spare_part_id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })
            ->make();
    }
}
