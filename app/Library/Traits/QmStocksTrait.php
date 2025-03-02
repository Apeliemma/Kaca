<?php

namespace App\Library\Traits;

use App\Models\Core\Stock;
use App\Repositories\StatusRepository;

trait QmStocksTrait
{
    public static function fetchPendingQmRequestsStatic()
    {
        return (new self())->fetchPendingQmRequests();
    }

    public function fetchPendingQmRequests()
    {
        return Stock::join('spare_parts', 'spare_parts.id', 'stocks.spare_part_id')
            ->leftJoin('suppliers', 'suppliers.id', 'stocks.issued_to')
            ->where('stocks.store_id', auth()->user()->store_id)
            ->where(function ($query) {
                $query->where('account_issued', 'supplier')
                    ->whereIn('stocks.issue_status', StatusRepository::getIssueStatus(['qm-approved', 'approved']));
            })
            ->orWhere(function ($query) {
                $query->where('account_issued', 'technician')
                    ->where('stocks.issue_status', StatusRepository::getIssueStatus('qm-approved'));
            })
            ->orWhere(function ($query) {
                $query->where('account_issued', 'store')
                    ->where('stocks.receive_status', StatusRepository::getReceiveStatus('processing'));
            })
            ->select('stocks.*', 'suppliers.name as supplier', 'spare_parts.part_number', 'spare_parts.description');
    }
}
