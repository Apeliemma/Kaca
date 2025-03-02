<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Repositories\SearchRepo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     *  view all the members
     */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    public function listUsers($role = null)
    {
//     dd('asd');
        if (\request('all'))
            return User::select('id',DB::raw('CONCAT(name, " (",username,")") AS name'))->where('status',1)->get();

        if (\request('user_role'))
            return User::select("id",DB::raw("CONCAT(users.rank,' ',users.full_name) as name"))
                ->where('role',$role)
                ->get();

        if ($role =='technician')
            $users = User::whereIn('role',['technician','mo'])
                ->select('users.*');
        elseif($role =='store')
            $users = User::join('permission_groups','permission_groups.id','users.permission_group_id')
                   ->leftJoin('stores','stores.id','users.store_id')
                ->select('users.*','permission_groups.name as title','stores.name as store');
        else
            $users = User::where('role',$role)
                  ->select('users.*');


        return SearchRepo::of($users)
            ->addColumn('action', function ($user) {
                $str = '';
                $json = json_encode($user);
                $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'add_user\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str .= '&nbsp;&nbsp;<a href="' . url('admin/users') . '/user/' . $user->id . '"  class="btn badge btn-dark btn-sm load-page"><i class="fa fa-eye"></i> view</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('admin/users/user/reset-password/'.$user->id).'\',\'\');" class="btn badge btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset Password</a>';
//                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url('admin/users/user/delete/'.$user->id).'\',\'\');" class="btn badge btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

}
