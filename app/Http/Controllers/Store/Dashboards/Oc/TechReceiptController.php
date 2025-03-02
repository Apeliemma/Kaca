<?php

namespace App\Http\Controllers\Store\Dashboards\Oc;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class TechReceiptController extends Controller
{
    public function index(){
        return view($this->folder.'tech_receipts');
    }

    public function approve($stockID){
        $stock = Stock::findOrFail($stockID);
        $stock->receive_status = StatusRepository::getReceiveStatus('approved');
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Stock approved successfully']);
    }

    public function decline(){
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['reason_for_declining']));

        $stock = Stock::findOrFail(\request('id'));
        $stock->receive_status = StatusRepository::getReceiveStatus('declined');
        $stock->remarks = \request('reason_for_declining');
        $stock->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Spare Part approved successfully']);
    }



    public function listReceipts(){
        $stocks = Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->whereNotNull('stocks.aircraft_id')
            ->where([
                ['stocks.entry_type','RV'],
                ['stocks.receive_status',StatusRepository::getReceiveStatus('processed')],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');


        if(\request('all'))
            return $stocks->get();
        return SearchRepo::of($stocks)
            ->addColumn('action',function($stock) {
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("mo/requisitions/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                if ($stock->receive_status === StatusRepository::getReceiveStatus('processed')){
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/dashboards/oc/tech/receipts/approve').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Approve</a>';
                    $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'declineReason\');" class="btn badgeButton btn-outline-danger btn-sm"><i class="fa fa-edit"></i>Decline</a>';

                }
                return $str;
            })
            ->addColumn('receive_status',function($stock) {
                return StatusRepository::getIssueStatus($stock->issue_status);
            })

            ->make();
    }
}
