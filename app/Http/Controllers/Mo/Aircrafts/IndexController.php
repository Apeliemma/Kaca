<?php

namespace App\Http\Controllers\Mo\Aircrafts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Aircraft;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class IndexController extends Controller
{
            /**
         * return aircraft's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store aircraft
     */
    public function storeAircraft(){
        request()->validate($this->getValidationFields(['property_model_id','model','tail_number','serial_number','engine_model']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('aircraft', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Aircraft '.$action.' successfully']);
    }

    /**
     * return aircraft values
     */
    public function listAircraft(){
        $aircraft = Aircraft::join('property_models','property_models.id','aircraft.property_model_id')
        ->select('aircraft.*','property_models.name as property_type');

        if(\request('all'))
            return $aircraft->selectRaw('CONCAT(property_models.name, " " ,aircraft.tail_number ) AS name, aircraft.id')->get();

        return SearchRepo::of($aircraft)
            ->addColumn('action',function($aircraft){
                $str = '';
                $json = json_encode($aircraft);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'aircraft_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/aircraft/delete').'\',\''.$aircraft->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete aircraft
     */
    public function destroyAircraft($aircraft_id)
    {
        $aircraft = Aircraft::findOrFail($aircraft_id);
        $aircraft->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Aircraft deleted successfully']);
    }

}
