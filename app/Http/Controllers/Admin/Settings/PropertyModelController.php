<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Core\Property;
use Illuminate\Http\Request;

use App\Models\Core\PropertyModel;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PropertyModelController extends Controller
{
            /**
         * return propertymodel's index view
         */
    public function index($property_id){
        return view($this->folder.'propertymodel.index',[
             'property'=>Property::findOrFail($property_id)
        ]);
    }

    /**
     * store propertymodel
     */
    public function storePropertyModel(){
        request()->validate($this->getValidationFields(['property_id','name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('property_models', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['_id'] = Str::orderedUuid();
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'PropertyModel '.$action.' successfully']);
    }

    /**
     * return propertymodel values
     */
    public function listPropertyModels(){
        $propertymodels = PropertyModel::leftJoin('properties','properties.id','property_models.property_id')
        ->select('property_models.*','properties.name as property');
        if(\request('all'))
            return $propertymodels->get();
        return SearchRepo::of($propertymodels)
            ->addColumn('action',function($propertymodel){
                $str = '';
                $json = json_encode($propertymodel);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'propertymodel_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/propertymodels/delete').'\',\''.$propertymodel->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete propertymodel
     */
    public function destroyPropertyModel($propertymodel_id)
    {
        $propertymodel = PropertyModel::findOrFail($propertymodel_id);
        $propertymodel->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'PropertyModel deleted successfully']);
    }

}
