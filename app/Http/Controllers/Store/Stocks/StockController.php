<?php

namespace App\Http\Controllers\Store\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function viewStock(int $stock_id){

        return view($this->folder.'stock',[
           'stock' => Stock::findOrFail($stock_id)
        ]);
    }
    public function approve(int $stockID){
        $stock = Stock::findOrFail($stockID);
        if (auth()->user()->isAllowedTo('officer_commanding') || auth()->user()->isAllowedTo('commanding_officer'))
            $stock->issue_status = StatusRepository::getIssueStatus('approved');
        else
             $stock->issue_status = StatusRepository::getIssueStatus('qm-approved');
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Stock approved successfully']);
    }

    public function returnToSupplier(int $store_part_id){
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['supplier_id','quantity','state','reason_for_issuance']));

        $storePart = StorePart::findOrFail($store_part_id);

        if (
            $storePart->unsvc_quantity < \request('quantity') && \request('state') == 'unserviceable' ||
            $storePart->svc_quantity < \request('quantity') && \request('state') == 'serviceable'
        )
            return redirect()->back()->with('notice',['type'=>'error','message'=>'You have in-sufficient quantity in stock']);

        $data = \request()->all();
        $data['user_id'] = auth()->id();
        $data['spare_part_id'] = $storePart->spare_part_id;
        $data['account_issued'] = 'supplier';
        $data['entry_type'] = 'IV';
        $data['issued_to'] = $data['supplier_id'];
        $data['store_id'] = auth()->user()->store_id;
        $data['reason'] = $data['reason_for_issuance'];
        $data['issue_status'] = StatusRepository::getIssueStatus('qm-approved');
        unset($data['reason_for_issuance'],$data['supplier_id']);
        $this->autoSaveModel($data);

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Processing for OC Approval successfully']);
    }

    public function decline(){
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['reason_for_declining']));

        $stock = Stock::findOrFail(\request('id'));
        if (auth()->user()->isAllowedTo('officer_commanding') || auth()->user()->isAllowedTo('commanding_officer'))
            $stock->issue_status = StatusRepository::getIssueStatus('declined');
        else
             $stock->issue_status = StatusRepository::getIssueStatus('qm-declined');
        $stock->remarks = \request('reason_for_declining');
        $stock->date = now()->toDateTimeString();
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Stock Request declined successfully']);
    }
}
