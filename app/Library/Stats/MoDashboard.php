<?php

namespace App\Library\Stats;

use App\Models\Core\Stock;
use App\Repositories\StatusRepository;

class MoDashboard
{
    public static function displayStats(){
        return [
            'tech_requests' => self::countTechRequests(),
            'tech_issues' => self::countTechIssues(),
            'qm_approved' => self::countQmApproved(),
            'qm_receipt' => self::countQmReceipts()
        ];
    }

    public static function countTechRequests(){
        return Stock::where([
                ['stocks.entry_type','IV'],
                ['stocks.issue_status',StatusRepository::getIssueStatus('processing')],
            ])->count();
    }

    public static function countTechIssues(){
        return Stock::where([
            ['stocks.entry_type','RV'],
            ['stocks.receive_status',StatusRepository::getReceiveStatus('draft')],
        ])->count();
    }

    public static function countQmApproved(){
        return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->where('stocks.entry_type','IV')
            ->whereIn('stocks.issue_status',StatusRepository::getIssueStatus(['qm-approved','qm-declined']))
            ->count();
    }

    public static function countQmReceipts(){
        return Stock::where('issue_status',StatusRepository::getIssueStatus('qm-issued'))
            ->whereNotNull('aircraft_id')
            ->count();
    }
}
