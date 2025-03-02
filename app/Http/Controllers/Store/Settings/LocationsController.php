<?php

namespace App\Http\Controllers\Store\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Location;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class LocationsController extends Controller
{

    /**
     * store location
     */
    public function storeLocation(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('locations', 'user_id'))
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
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Location '.$action.' successfully']);
    }

    /**
     * return location values
     */
    public function listLocations(){
        $locations = Location::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $locations->get();
        return SearchRepo::of($locations)
            ->addColumn('action',function($location){
                $str = '';
                $json = json_encode($location);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'location_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/locations/delete').'\',\''.$location->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete location
     */
    public function destroyLocation($location_id)
    {
        $location = Location::findOrFail($location_id);
        $location->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Location deleted successfully']);
    }

}
