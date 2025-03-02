<?php

namespace App\Http\Controllers\Mo\Requisitions;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    public function index($stockID){
        $stock = Stock::findOrFail($stockID);
        return view($this->folder.'requisition.index',[
            'sparePart'=>$stock->sparePart
        ]);
    }

    public function approve($stockID){
        $stock = Stock::findOrFail($stockID);
        $storePart = StorePart::where([
            ['store_id',$stock->store_id],
            ['spare_part_id',$stock->spare_part_id]
        ])->first();
        // only issue if it is in stock
        if ($storePart->quantity > 0){
            $stock->issue_status = StatusRepository::getIssueStatus('mo-approved');
            // you can only request a maximum of items we have in stock
            $stock->quantity =  ($stock->quantity_requested > $storePart->quantity) ? $storePart->quantity : $stock->quantity_requested;
        }else{
            // if item is nill in stock we decline automatically
            $stock->issue_status = StatusRepository::getIssueStatus('mo-declined');
             $stock->remarks = 'Out of Stock';
        }
        $stock->mo_id = auth()->id();
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Spare Part approved successfully']);
    }

    public function decline(){
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['reason_for_declining']));

        $stock = Stock::findOrFail(\request('id'));
        $stock->issue_status = StatusRepository::getIssueStatus('mo-declined');
        $stock->remarks = \request('reason_for_declining');
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Spare Part approved successfully']);
    }
}
