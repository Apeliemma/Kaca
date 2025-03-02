<?php

namespace App\Http\Controllers\User;

use App\Models\Core\LeaveRequest;
use App\Models\Core\LeaveType;
use App\Models\Core\Staff;
use App\Repositories\SearchRepo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use Notification;
use App\Notifications\GeneralNotification;

class UserController extends Controller
{
    public function profile()
    {
        $user = request()->user();

        return view($this->folder . 'profile', compact('user'));
    }


    public function updateProfile()
    {
        request()->validate([
            'name' => 'required',
//            'username' => 'required','unique:users,username,'.auth()->id(),
//            'phone_number' => ['unique:users','regex:/^((\+?254|0){1}[7]{1}[0-9]{8})$/'],
        ]);
        request()->user()->update([
            'name' => request()->name
        ]);
        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Profile updated successfully']);
    }


    public function updateProfilePicture()
    {
        request()->validate([
            'avatar' => 'mimes:jpeg,jpg,png|required|max:2048'
        ]);
        if (request()->user_id) {
            $user = User::find(request()->user_id);
        } else {
            $user = request()->user();
        }

        $image_path = storage_path() . '/app/public/profile-pics/' . $user->avatar;
        if ($user->avatar != "user.jpg" && @getimagesize($image_path))
            unlink($image_path);

        $image = request()->file('avatar');
        $ext = $image->getClientOriginalExtension();
        $image_original_name = $image->getClientOriginalName();
        $image_name = str_replace('.' . $ext, '', $image_original_name);
        $name = $user->id . '_' . $image_name . "." . $ext;
        $user->avatar = $name;
        $user->update();
        $image->move(storage_path() . '/app/public/profile-pics', $name);
        return back()->with('notice',['type'=>'success','message'=>'Profile image updated successfully']);
    }

    public function updatePassword()
    {
        $currentuser = request()->user();

        request()->validate([
//            'old_password' => ['required', new OldPasswordValidator()],
            'password' => 'required'
        ]);
        $currentuser->password = bcrypt(request('password'));
        $currentuser->update();

        $user = request()->user();
//        Notification::send($user, new GeneralNotification('password_update',$currentuser));
        return back()->with('notice',['type'=>'success','message'=>'Password updated successfully']);
    }

}
