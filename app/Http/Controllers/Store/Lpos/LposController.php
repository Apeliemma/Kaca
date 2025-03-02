<?php

namespace App\Http\Controllers\Store\Lpos;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Core\Lpo;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class LposController extends Controller
{
            /**
         * return lpo's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store lpo
     */
    public function storeLpo(Request $request){
        if (\request('type') == 'lpo')
        {
            $request->validate($this->getValidationFields(['LPO_number','issued_by','delivery_note','invoice_number','LPO_date','delivery_date']));
            $this->createLocalLPO($request);
        }
        else{
            $request->validate($this->getValidationFields(['invoice_number','issued_by','packing_list','airway_bill','delivery_date']));
            $this->createOverseasLPO($request);
        }

         $action = \request('id') ? 'updated' : 'saved';
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Lpo '.$action.' successfully']);
    }

    private function createLocalLPO($request){
        $lpos = [];
        $lpos['form_model'] = Lpo::class;
        $lpos['number'] = $request->LPO_number;
        $lpos['user_id'] = auth()->id();
        $lpos['store_id'] = auth()->user()->store_id;
        $lpos['supplier_id'] = $request->issued_by;
        $lpos['reference'] = "LPO Number : ". $request->LPO_number."<br/>"."Delivery Note : ". $request->delivery_note."<br/>"."Invoice Number : ". $request->invoice_number."<br/>";
        $lpos['delivery_date'] = Carbon::parse($request->delivery_date)->toDateTimeString();
        $lpos['date'] = Carbon::parse($request->LPO_date)->toDateTimeString();
        $this->autoSaveModel($lpos);
        return true;
    }
    private function createOverseasLPO($request){
        $lpos = [];
        $lpos['form_model'] = Lpo::class;
        $lpos['number'] = $request->invoice_number;
        $lpos['user_id'] = auth()->id();
        $lpos['supplier_id'] = $request->issued_by;
        $lpos['store_id'] = auth()->user()->store_id;
        $lpos['type'] = 'overseas';
        $lpos['reference'] = "Packing List : ". $request->packing_list."<br/>"."Airway Bill : ". $request->airway_bill."<br/>";
        $lpos['delivery_date'] = Carbon::parse($request->delivery_date)->toDateTimeString();
        $lpos['date'] = Carbon::parse($request->LPO_date)->toDateTimeString();
        $this->autoSaveModel($lpos);
        return true;
    }

    /**
     * return lpo values
     */
    public function listLpos(){
        if (\request('supplier_id'))
            return Lpo::where('supplier_id',\request('supplier_id'))
                ->where('type',\request('type'))
                ->orderBy('created_at','DESC')
                ->select("id", "number as name")
                ->get();

        $lpos = Lpo::join('suppliers','suppliers.id','lpos.supplier_id')
            ->where('store_id',auth()->user()->store_id)
            ->select('lpos.*','suppliers.name as supplier');

        if(\request('all'))
            return $lpos->get();
        if(\request()->has('q')){
            $search = \request()->q;
            $lpos =Lpo::select("id", "number as name")
                ->where('number', 'LIKE', "$search%")
                ->get();
            return response()->json($lpos);
        }

        return SearchRepo::of($lpos)
            ->addColumn('action',function($lpo){
                $str = '';
                $json = json_encode($lpo);
                $str.='<a href="'.url("store/lpos/lpo/".$lpo->id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';

//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'lpo_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> View</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/lpos/delete').'\',\''.$lpo->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete lpo
     */
    private function destroyLpo($lpo_id)
    {
        $lpo = Lpo::findOrFail($lpo_id);
        $lpo->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Lpo deleted successfully']);
    }

}
