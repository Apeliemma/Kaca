<?php

namespace App\Http\Controllers\Admin\Logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Log;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class LogsController extends Controller
{
            /**
         * return log's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store log
     */
    public function storeLog(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('logs', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
         if(\request()->id){
             $action="updated";
          }else{
            $action="saved";
         }
        $this->autoSaveModel($data);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Log '.$action.' successfully']);
    }

    /**
     * return log values
     */
    public function listLogs(){
        $logs = Log::join('log_types','log_types.id','=','logs.log_type_id')
            ->select('logs.*','log_types.name as title');

        if(\request('all'))
            return $logs->get();
        return SearchRepo::of($logs)
            ->addColumn('action',function($log){
                $str = '';
                $json = json_encode($log);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'log_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/logs/delete').'\',\''.$log->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete log
     */
    public function destroyLog($log_id)
    {
        $log = Log::findOrFail($log_id);
        $log->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Log deleted successfully']);
    }

}
