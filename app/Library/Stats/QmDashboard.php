<?php

namespace App\Library\Stats;

use App\Library\Traits\QmStocksTrait;
use App\Models\Core\Stock;
use App\Repositories\StatusRepository;

class QmDashboard
{
    use QmStocksTrait;

    public static function displayQmStats()
    {
        return [
            'tech_requests' => self::countApprovedRequests(),
            'tech_receipts' => self::countTechReceipts(),
            'pending_requests' => self::countPendingRequests(),
            'approved_requests' => self::countTechRequests()
        ];
    }

    private static function countApprovedRequests()
    {
        return Stock::where([
            ['stocks.entry_type', 'IV'],
            ['stocks.issue_status', StatusRepository::getIssueStatus('mo-approved')],
        ])->where('stocks.store_id', auth()->user()->store_id)
            ->count();
    }

    private static function countTechReceipts()
    {
        return Stock::where([
            ['stocks.entry_type', 'RV'],
            ['stocks.aircraft_id', '!=', null],
            ['stocks.receive_status', StatusRepository::getIssueStatus('processing')],
        ])->where('stocks.store_id', auth()->user()->store_id)
            ->count();
    }

    private static function countPendingRequests()
    {
        return self::fetchPendingQmRequestsStatic()->count();
    }

    private static function countTechRequests()
    {
        return Stock::where('stocks.store_id', auth()->user()->store_id)
            ->where(function ($query) {
                $query->where([
                    ['stocks.entry_type', 'RV'],
                    ['stocks.account_issued', 'store']
                ])
                    ->whereIn('stocks.receive_status',
                        StatusRepository::getReceiveStatus(['approved', 'declined']));
            })
            ->orWhere(function ($query) {
                $query->where([
                    ['stocks.entry_type', 'IV'],
                    ['stocks.account_issued', 'technician'],
                    ['stocks.issue_status', StatusRepository::getIssueStatus('approved')]
                ]);
            })
            ->count();
    }
}
