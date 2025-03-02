<?php

namespace App\Http\Controllers\Technician\Stores\Items;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use Illuminate\Http\Request;

class TloansController extends Controller
{
    public function index(){
        return view($this->folder.'tloans');
    }

    public function listTloans(){
        $stocks = Stock::join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.issue_type','TL'],
                ['stocks.issued_to',auth()->id()],
                ['stocks.account_issued','technician'],
            ])->select('stocks.*','spare_parts.part_number as part_number','spare_parts.description as description');

        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('status',function($stock) {
               if (!$stock->received_by)
                   return '<span class="legend-indicator bg-danger"></span> Not Returned';

               return '<span class="legend-indicator bg-success"></span> Returned';
            })
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("technician/stores/items/".$stock->spare_part_id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })->make();
    }
}
