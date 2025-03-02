<?php

namespace App\Http\Controllers\Store\Settings\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Store;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class StoresController extends Controller
{


    /**
     * store store
     */
    public function storeStore(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('stores', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
         $data['slug'] = Str::slug($data['name']);
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Store '.$action.' successfully']);
    }

    /**
     * return store values
     */
    public function listStores(){
        $stores = Store::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $stores->get();
        return SearchRepo::of($stores)
            ->addColumn('action',function($store){
                $str = '';
                $json = json_encode($store);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'store_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/stores/delete').'\',\''.$store->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete store
     */
    public function destroyStore($store_id)
    {
        $store = Store::findOrFail($store_id);
        $store->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Store deleted successfully']);
    }

}
