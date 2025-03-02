<?php

namespace App\Http\Controllers\Store\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Department;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DepartmentsController extends Controller
{

    /**
     * store department
     */
    public function storeDepartment(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('departments', 'user_id'))
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
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Department '.$action.' successfully']);
    }

    /**
     * return department values
     */
    public function listDepartments(){
        $departments = Department::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $departments->get();
        return SearchRepo::of($departments)
            ->addColumn('action',function($department){
                $str = '';
                $json = json_encode($department);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'department_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/departments/delete').'\',\''.$department->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete department
     */
    public function destroyDepartment($department_id)
    {
        $department = Department::findOrFail($department_id);
        $department->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Department deleted successfully']);
    }

}
