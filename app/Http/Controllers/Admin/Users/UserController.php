<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Repositories\StatusRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index($id){
        $unpaid = 0;
        $user = User::findOrFail($id);
        $tabs = ['info'];

        return view($this->folder.'user.index',[
            'user'=>$user,
            'tabs'=>$tabs
        ]);
    }

// Admin user can login as user
    public function login($user_id){
        Auth::logout();
        Auth::loginUsingId($user_id);
        return redirect('home');
    }


    public function getDates($user){
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $month = array_search(request('month'),$months)+1;
        $year = request('year');
        $date = Carbon::create($year,$month);
        $tuesdays = [];
        $next_month = Carbon::create($year,$month)->addMonth();
        while($next_month>$date){
            if($date->isTuesday())
                $tuesdays[] = $date->toDateString();


        }
        dd($date);
    }

    public function verifyEmail($user_id){
        $user = User::findOrFail($user_id);
        $user->email_verified_at = now();
        $user->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Email Verified successfully']);
    }

    public function createUser(){
        if (\request('role') === 'technician')
            request()->validate($this->getValidationFields(['full_name','service_number','rank','phone','role','username','department_id']));
        else
            request()->validate($this->getValidationFields(['full_name','service_number','rank','phone','role','username']));

        $data = \request()->all();
        $data['created_by'] = \auth()->id();

//        $data['role'] = \request()->user_role;
//        unset($data['user_role']);
        if (\request('id') == '')
            $data['password'] = 'KACA@'.\request()->service_number;

        $message= 'User: '.$data['full_name'].'with Role: '.$data['role'].' has been created';

           $data['password_updated_at'] = 1;
           $data['status'] = 1;
           $data['_id'] = Str::orderedUuid();
        $user = $this->autoSaveModel($data);
//        $token = app('auth.password.broker')->createToken($user);
//        $url = "password/reset/" . $token;
//        $notification = new InitialAccount($token, $url, $user->name);
//        $user->notify($notification);
        return redirect()->back()->with('notice',['type'=>'success','message'=>$message]);
    }
    public function storeUser(){

        request()->validate($this->getValidationFields(['full_name','service_number','rank','email','phone','username','store_id','permission_group_id']));
        $data = \request()->all();
        $data['created_by'] = \auth()->id();

//        $data['role'] = \request()->user_role;
//        unset($data['user_role']);
        if (\request('id') == '')
            $data['password'] = 'KACA@'.\request()->service_number;
        $data['role'] = 'store';
        $message= 'User has been created password successfully';

       $data['status'] = 1;
       $data['_id'] = Str::orderedUuid();
        $data['password_updated_at'] = 1;

        $user = $this->autoSaveModel($data);
//        $token = app('auth.password.broker')->createToken($user);
//        $url = "password/reset/" . $token;
//        $notification = new InitialAccount($token, $url, $user->name);
//        $user->notify($notification);
        return redirect()->back()->with('notice',['type'=>'success','message'=>$message]);
    }

    public function updateUserPassword($id){
        \request()->validate([
            'new_password'=>'required'
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make(request('new_password'));
        $user->update();
        $user->new_password = \request('new_password');
//        $user->notify(new GeneralNotification('change-user-password',null,null,null,\request('new_password')));
        return redirect()->back()->with('notice',['type'=>'success','message'=>'User password changed']);
    }


    public function activate($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'User has been Activated successfully']);
    }

    public function resetPassword($user_id){
        $user = User::findOrFail($user_id);

        $password = $user->username.'@'.date('Y');
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'User password has been reset successfully to '.$password]);
    }

    public function deactivate($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('notice',['type'=>'success','message'=>'User has been Deactivated successfully']);
    }

//    public function switchRole($user_id){
//        Auth::logout();
//        $user = Auth::loginUsingId($user_id);
//        return redirect(\auth()->user()->role)->with('notice',['type'=>'success','message'=>'You have successfully switched Account']);
//    }

    public function unsuspend($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->status = 1;
        $user->save();
//        LogsRepository::storeLog('user_suspend','un-suspended/Resumed user: <b>'.$user->name.'('.$user->role.')</b>');
        return back()->with('notice',['type'=>'success','message'=>'User has been resumed']);
    }
    /**
     * delete user
     */
    public function destroyUser($user_id)
    {
        $announcement = User::findOrFail($user_id);
        $announcement->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'User deleted successfully']);
    }

}
