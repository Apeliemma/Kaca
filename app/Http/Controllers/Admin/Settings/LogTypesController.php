<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\LogType;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class LogTypesController extends Controller
{
            /**
         * return logtype's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store logtype
     */
    public function storeLogType(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('logtypes', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'LogType '.$action.' successfully']);
    }

    /**
     * return logtype values
     */
    public function listLogTypes(){
        $logtypes = LogType::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $logtypes->get();
        return SearchRepo::of($logtypes)
            ->addColumn('action',function($logtype){
                $str = '';
                $json = json_encode($logtype);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'logtype_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/logtypes/delete').'\',\''.$logtype->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete logtype
     */
    public function destroyLogType($logtype_id)
    {
        $logtype = LogType::findOrFail($logtype_id);
        $logtype->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'LogType deleted successfully']);
    }

}
