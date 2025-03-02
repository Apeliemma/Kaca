<?php

namespace App\Http\Controllers\Store\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Core\Supplier;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SuppliersController extends Controller
{
    public function supplier($supplierID){
        return view($this->folder.'supplier',[
             'supplier'=>Supplier::findOrFail($supplierID)
        ]);
    }
            /**
         * return supplier's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store supplier
     */
    public function storeSupplier(){
        request()->validate($this->getValidationFields(['name','email']));
        \request()->merge(['form_model'=>\App\Models\Core\Supplier::class]);
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('suppliers', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
         $data['_id'] = Str::orderedUuid();
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Supplier '.$action.' successfully']);
    }

    /**
     * return supplier values
     */
    public function listSuppliers(){
        $suppliers = Supplier::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $suppliers->get();
        return SearchRepo::of($suppliers)
            ->addColumn('action',function($supplier){
                $str = '';
                $json = json_encode($supplier);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'supplier_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/suppliers/delete').'\',\''.$supplier->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                $str.='&nbsp;&nbsp;<a href="'.url("store/suppliers/".$supplier->id).'" class="btn badge btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })->make();
    }

    /**
     * delete supplier
     */
    public function destroySupplier($supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);
        $supplier->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Supplier deleted successfully']);
    }

}
