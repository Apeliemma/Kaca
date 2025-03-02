<?php

namespace App\Library\Stats;

use App\Models\Core\Stock;
use App\Repositories\StatusRepository;

class OcDashboard
{
    public static function displayStats(){
        return [
            'tech_issues' => self::countTechIssues(),
            'tech_receipts' => self::countTechReceipts(),
            'supplier_assd_issues' => self::countSupplierAssdIssues(),
            'supplier_assd_receipts' => self::countSupplierAssdReceipts()
        ];
    }

    public static function countTechIssues(){
        return Stock::join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->whereNotNull('stocks.aircraft_id')
            ->where([
                ['stocks.entry_type','IV'],
                ['spare_parts.control_level',4],
                ['stocks.issue_status',StatusRepository::getIssueStatus('qm-approved')],
            ])->count();
    }

    public static function countTechReceipts(){
         return Stock::whereNotNull('stocks.aircraft_id')
             ->where([
                 ['stocks.entry_type','RV'],
                 ['stocks.receive_status',StatusRepository::getReceiveStatus('processed')],
             ])->count();
    }

    public static function countSupplierAssdIssues(){
        return Stock::where([
                ['account_issued','supplier'],
                ['issue_status',StatusRepository::getIssueStatus('qm-approved')]
            ])->count();
    }

    public static function countSupplierAssdReceipts(){
        return Stock::where([
                ['stocks.entry_type','RV'],
                ['stocks.account_issued','store'],
                ['stocks.receive_status',StatusRepository::getReceiveStatus('processing')],
            ])->count();
    }
}
