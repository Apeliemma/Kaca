<?php

namespace App\Http\Controllers\Technician\Requisitions;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    public function createRequisition($storePartId){
        \request()->merge(['form_model'=>Stock::class]);
        request()->validate($this->getValidationFields(['department_id','quantity_requested','reason','aircraft_id']));
        $data = \request()->all();
        $storePart = StorePart::findOrFail($storePartId);
        $data['spare_part_id'] = $storePart->spare_part_id;

        //TODO alerts when user requests item quantity that exceeds store stocks
        if ($storePart->quantity == 0)
            return redirect()->back()->with('notice',['type'=>"error",'message'=>"The item you have requested is Out of Stock"]);

        $data['user_id'] = auth()->id();
        $data['account_issued'] = 'technician';
        $data['entry_type'] = 'IV';
        $data['store_id'] = $storePart->store_id;
        $data['issue_status'] = StatusRepository::getIssueStatus('processing');
        $this->autoSaveModel($data);

        return redirect('technician/stores/items/'.$storePartId.'?tab=requisitions&t_tab_optmized=1')->with('notice',['type'=>'success','message'=>'Requisition created successfully']);
    }

    /**
     * return stock values
     */
    public function listPartRequisition($sparePartId = null){
        if ($sparePartId)
            $stocks = Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
                ->leftjoin('departments','departments.id','stocks.department_id')
            ->where([
                ['stocks.user_id',auth()->id()],
                ['stocks.entry_type','IV'],
                ['stocks.issue_status','!=',StatusRepository::getIssueStatus('qm-issued')],
                ['stocks.spare_part_id',$sparePartId]
            ])->select('stocks.*','aircraft.tail_number as tail_number','departments.name as department');
        else
            $stocks = Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
                ->leftjoin('departments','departments.id','stocks.department_id')
                ->where([
                    ['stocks.user_id',auth()->id()],
                    ['stocks.entry_type','IV'],
                    ['stocks.issue_status','!=',StatusRepository::getIssueStatus('qm-issued')],
                ])->select('stocks.*','aircraft.tail_number as tail_number','departments.name as department');


        if(\request('all'))
            return $stocks->get();
        return SearchRepo::of($stocks)
            ->addColumn('issue_type',function($stock) {
                return $stock->issue_type == 'NML' ? 'Normal Issue' : 'Temporary Loan';
            })
            ->addColumn('quantity',function($stock) {
                return $stock->quantity == 0 ? $stock->quantity_requested : $stock->quantity;
            })
            ->addColumn('entry_date',function($stock) {
                return $stock->created_at->format('d-m-Y');
            })
            ->addColumn('issue_status',function($stock) {
                return StatusRepository::getIssueStatus($stock->issue_status);
            })
            ->make();
    }

}
