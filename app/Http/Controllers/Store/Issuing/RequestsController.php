<?php

namespace App\Http\Controllers\Store\Issuing;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\Traits\StocksIssuingTrait;
use App\Traits\StocksTrait;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    use StocksIssuingTrait;
    public function index(){
        return view($this->folder.'requests');
    }

    public function issued(){
        return view($this->folder.'issued');
    }

    public function issue()
    {
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['issue_details','received_by']));
        $stockId = \request('id');

        $stock = Stock::findOrFail($stockId);
        $stock->issued_to = $stock->user_id;
        $stock->issued_by = auth()->id();
        $stock->reference = \request('issue_details');
        $stock->received_by = \request('received_by');
        $stock->save();
        //TODO reduce items quantity from spare parts quantity
        $this->decrementStockQuantity($stockId);
//        dd($response);

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Issuing was successfully']);
    }

    public function listRequestedStocks($status){
        $stocks = Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.entry_type','IV'],
                ['stocks.account_issued','technician'],
                ['stocks.store_id',auth()->user()->store_id],
                ['stocks.issue_status',StatusRepository::getIssueStatus($status)],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');

        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("store/stocks/spareparts/".$stock->spare_part_id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                if ($stock->issue_status == StatusRepository::getIssueStatus('approved'))
                    $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'issueRequests\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Issue</a>';

//                $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/issuing/requests/issue').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Issue</a>';
                return $str;
            })->make();
    }
}
