<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Property;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
            /**
         * return property's index view
         */
    public function index(){
        return view($this->folder.'property.index',[

        ]);
    }

    /**
     * store property
     */
    public function storeProperty(){
        request()->validate($this->getValidationFields(['name','description']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('properties', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']);
        $data['_id'] = Str::orderedUuid();
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Property '.$action.' successfully']);
    }

    /**
     * return property values
     */
    public function listProperties(){
        $properties = Property::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $properties->get();
        return SearchRepo::of($properties)
            ->addColumn('action',function($property){
                $str = '';
                $json = json_encode($property);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'property_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str .= '&nbsp;&nbsp;<a href="' . url('admin/settings') . '/propertymodel/' . $property->id . '"  class="btn badge btn-dark btn-sm load-page"><i class="fa fa-eye"></i> view</a>';
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/properties/delete').'\',\''.$property->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete property
     */
    public function destroyProperty($property_id)
    {
        $property = Property::findOrFail($property_id);
        $property->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Property deleted successfully']);
    }

}
