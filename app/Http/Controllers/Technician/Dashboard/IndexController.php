<?php

namespace App\Http\Controllers\Technician\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function listRequestsByStatus($status){

        $stocks = Stock::join('spare_parts','stocks.spare_part_id','spare_parts.id')
            ->join('store_parts','store_parts.spare_part_id','spare_parts.id')
            ->leftJoin('stores','stores.id','store_parts.store_id')
            ->where('stocks.issue_status',StatusRepository::getIssueStatus($status))
            ->whereNotNull('stocks.aircraft_id')
            ->select('spare_parts.part_number','stocks.id','stocks.date','spare_parts.serial_number','stores.name as store','stocks.*','spare_parts.description');

      return $this->renderPageResponse($stocks);
    }

    private function renderPageResponse($stocks){
        return SearchRepo::of($stocks)
            ->addColumn('quantity',function($stock){
                return $stock->quantity ==0 ? $stock->quantity_requested : $stock->quantity;
            })
            ->addColumn('entry_date',function($stock){
                return $stock->created_at->toDateString();
            })
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='&nbsp;&nbsp;<a href="'.url("technician/stores/items/stock/".$stock->id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })
            ->make();
    }
}
