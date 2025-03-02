<?php

namespace App\Http\Controllers\Store\Issuing;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index(){
        return view($this->folder.'suppliers');
    }

    public function listIssuesToSupplier(){
        $stocks = Stock::join('spare_parts','spare_parts.id','stocks.spare_part_id')
        ->join('suppliers','suppliers.id','stocks.issued_to')
            ->where([
                ['account_issued','supplier'],
                ['stocks.store_id',auth()->user()->store_id]
            ])
            ->whereIn('issue_status',StatusRepository::getIssueStatus(['qm-approved','approved','qm-issued']))

            ->select('stocks.*','suppliers.name as supplier','spare_parts.part_number','spare_parts.description');

        return SearchRepo::of($stocks)
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("store/stocks/spareparts/".$stock->spare_part_id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';

//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'lpo_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> View</a>';
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/lpos/delete').'\',\''.$lpo->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }
}
