<?php

namespace App\Http\Controllers\Store\Stocks;

use App\Http\Controllers\Controller;
use App\Repositories\StatusRepository;
use App\Traits\StocksTrait;
use Illuminate\Http\Request;

use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class StocksController extends Controller
{
    use StocksTrait;
            /**
         * return stock's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store stock
     */
    public function storeStock(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('stocks', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Stock '.$action.' successfully']);
    }

    /**
     * return stock values
     */
    public function listStocks($status){
        $stocks = $this->showStocks($status);

        if(\request('all'))
            return $stocks->get();
        return SearchRepo::of($stocks)
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("store/stocks/spareparts/".$stock->spare_part_id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';

                if ($stock->issue_status === StatusRepository::getIssueStatus('mo-approved')){
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/stocks/stock/approve').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Process</a>';
                    $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'declineReason\');" class="btn badgeButton btn-outline-danger btn-sm"><i class="fa fa-edit"></i>Decline</a>';

                }
                elseif(auth()->user()->isAllowedTo('officer_commanding') && StatusRepository::getIssueStatus('qm-approved') ||
                    auth()->user()->isAllowedTo('commanding_officer') && StatusRepository::getIssueStatus('qm-approved')){
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/stocks/stock/approve').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Approve</a>';
                    $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'declineReason\');" class="btn badgeButton btn-outline-danger btn-sm"><i class="fa fa-edit"></i>Decline</a>';
                }
                return $str;
            })->make();
    }

    /**
     * delete stock
     */
    public function destroyStock($stock_id)
    {
        $stock = Stock::findOrFail($stock_id);
        $stock->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Stock deleted successfully']);
    }

}
