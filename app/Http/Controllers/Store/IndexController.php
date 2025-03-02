<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Library\Stats\OcDashboard;
use App\Library\Stats\QmDashboard;
use App\Notifications\SmartNotification;
use Illuminate\Support\Facades\Notification;

class IndexController extends Controller
{
    public function index(){

//        Notification::send(auth()->user(),new SmartNotification('Book has Paid','Testing notification for the users',['database']));

        $status = 'mo-approved';
        if (auth()->user()->isAllowedTo('officer_commanding') || auth()->user()->isAllowedTo('commanding_officer'))
        {
            $status = 'qm-approved';
            $dashboardStats = OcDashboard::displayStats();
        }
        else
            $dashboardStats = [
                'technician' => QmDashboard::displayQmStats()
            ];

        return view($this->folder.'index',[
            'status' => $status,
            'dashboardStats' => $dashboardStats,
        ]);
    }


}
