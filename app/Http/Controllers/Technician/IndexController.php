<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        return view($this->folder.'index',[
            'dashboardStats' => $this->computeDashboardStats()
        ]);
    }

    private function computeDashboardStats(){
        return $dashboardStats = [
            'qm_requests' =>  Stock::whereNotNull('stocks.aircraft_id')->where('stocks.issue_status',StatusRepository::getIssueStatus('processing'))->count(),
            'mo_approved' =>  Stock::whereNotNull('stocks.aircraft_id')->where('stocks.issue_status',StatusRepository::getIssueStatus('mo-approved'))->count(),
            'qm_process' =>  Stock::whereNotNull('stocks.aircraft_id')->where('stocks.issue_status',StatusRepository::getIssueStatus('qm-approved'))->count(),
            'qm_approved' =>  Stock::whereNotNull('stocks.aircraft_id')->where('stocks.issue_status',StatusRepository::getIssueStatus('approved'))->count()
        ];
    }
}
