<?php

namespace App\Http\Controllers\Technician\Stores;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        return view($this->folder.'items.index');
    }

    public function makeRequisition(){
        return view($this->folder.'items.make_requisition');
    }

    public function showForcesForm890($stockID){
        return view($this->folder.'items.form_890',[
            'stock' => Stock::findOrFail($stockID)
        ]);
    }

    public function viewPart($storePartId){
        $storePart = StorePart::findOrFail($storePartId);
        return view($this->folder.'items.view_part',[
            'storePart' => $storePart,
            'sparePart'=>$storePart->sparePart
        ]);
    }

    public function issue(){
        \request()->merge(['form_model'=>Stock::class]);
//        request()->validate($this->getValidationFields(['aircraft_id','state','issue_number','reason']));
        request()->validate([
            'issue_number' => 'integer|required',
            'store_id' => 'required',
            'aircraft_id' => 'required',
            'state' => 'required',
            'reason' => 'required'
        ]);
        $data = \request()->all();
        $data['user_id'] = auth()->id();
        $data['spare_part_id'] = $data['id'];
        $data['quantity'] = $data['issue_number'];
        $data['entry_type'] = 'RV';
//        $data['issue_status'] = StatusRepository::getIssueStatus('processing');
        $data['issued_by'] = auth()->id();
        unset($data['id'], $data['issue_number']);
        $this->autoSaveModel($data);

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Processed Item for Issuing successfully']);
    }

    /**
     * return sparepart values
     */
    public function listSpareParts(){
        $storeparts = StorePart::join('spare_parts','store_parts.spare_part_id','spare_parts.id')
            ->join('stores','stores.id','store_parts.store_id')
        ->select('spare_parts.*','stores.name as store','store_parts.id');
//        $spareparts = SparePart::where([
//            ['id','>',0]
//        ]);
        if(\request('all'))
            return $storeparts->get();
        return SearchRepo::of($storeparts)
            ->addColumn('action',function($storepart){
                $str = '';
                $json = json_encode($storepart);
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/spareparts/delete').'\',\''.$sparepart->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                $str.='<a href="'.url("technician/stores/items/".$storepart->id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'issue_to_store\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Issue to Store</a>';

                return $str;
            })->make();
    }
}
