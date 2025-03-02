<?php

namespace App\Traits;

use App\Library\Stats\QmDashboard;

trait DashboardStats
{
    public function qmStats(){
        return [
            'technician' => QmDashboard::displayQmStats()
        ];
    }


}
