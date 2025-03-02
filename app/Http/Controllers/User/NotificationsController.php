<?php

namespace App\Http\Controllers\User;

use App\Repositories\SearchRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index(){
        return view($this->folder.'notifications.index');
    }
    //
    public function getUnreadNotifications(){

        $notifications = \request()->user()->notifications()->where('read_at', null)->get();
        foreach ($notifications as $key=>$notification){
            $notifications[$key]->created = $notification->created_at->diffForHumans();
        }
        return $notifications;
    }
    public function viewNotification($id){
        $notification = \request()->user()->notifications()->findOrFail($id);
        $notification->read_at = Carbon::now();
        $notification->update();
        return redirect('user/notifications/view-all');
    }
    public function markAllRead(){
        $user=\request()->user();
        $notifications= $user->unreadNotifications->markAsRead();
        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'All Notifications Mark Read Successfully']);

    }
    public function viewAll(){
        $notification = \request()->user()->notifications();
        return view($this->folder.'notifications.index',[
            'notification'=>$notification
        ]);
    }
    public function listNotifications($type){
        $user=Auth::user();
        if($type == 'count'){
            return [
                'all'=>$user->notifications()->count(),
                'read'=>$user->notifications()->where('read_at', '<>', null)->count(),
                'unread'=>$user->unreadNotifications()->count()
            ];
        }

        if($type =='read'){
            $notifications = $user->notifications()->where('read_at', '<>', null);
        }
        if($type =='allNotification'){
            $notifications = $user->notifications();
        }
        if($type =='unread'){
            $notifications = $user->unreadNotifications();
        }
        return SearchRepo::of($notifications)
            ->addColumn('created_on',function($notification){
                return Carbon::parse($notification->created_at)->toDayDateTimeString();
            })
            ->addColumn('subject',function($notification){
                return $notification->data['subject'];
            })
            ->addColumn('message',function($notification){
                return $notification->data['message'];
            })
            ->addColumn('action',function($notification){
//                $url = $notification->data['action_url'];
                $str = '<div class="btn-group">';
                $str.='<a href="#"  onclick="return markNotifictionAsRead(\''.$notification->id.'\')" class="btn btn-info btn-sm load-page"><i class="fa fa-eye"></i> Mark as Read</a>';
                $str.='</div>';
                return $str;
            })
            ->make(true);
    }

    function markedRead($id){
        $notification = \request()->user()->notifications()->findOrFail($id);
        if($notification->read_at==null){
            $notification->read_at = Carbon::now();
            $notification->update();
        }

    }


}
