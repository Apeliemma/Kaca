<?php

namespace App\Http\Controllers\Store\Dashboards\Qm;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\Traits\StocksReceivingTrait;
use function request;

class ReceiveRequestsController extends Controller
{
    use StocksReceivingTrait;

    public function index()
    {
        return view($this->folder.'receive_requests');
    }

    public function receiveStock($stockID)
    {
        $this->updateStockQuantity($stockID);

        // TODO add to audit Trail
        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock received successfully']);
    }


    public function listReceivedRequests()
    {
        // TODO add logic for issuing items that has been approved by CO or OC
        $stocks = Stock::join('spare_parts', 'spare_parts.id', 'stocks.spare_part_id')
            ->where('stocks.store_id', auth()->user()->store_id)
            ->where(function ($query) {
                $query->where([
                    ['stocks.entry_type', 'RV'],
                    ['stocks.account_issued', 'store']
                ])->whereIn('stocks.receive_status',
                    StatusRepository::getReceiveStatus(['approved', 'declined']));
            })
            ->orWhere(function ($query) {
                $query->where([
                    ['stocks.entry_type', 'IV'],
                    ['stocks.account_issued', 'technician'],
                    ['stocks.issue_status', StatusRepository::getIssueStatus('approved')],
                ]);
            })
            ->select('stocks.*', 'spare_parts.part_number', 'spare_parts.description');


        if (request('all')) {
            return $stocks->get();
        }
        return SearchRepo::of($stocks)
            ->addColumn('Status', function ($stock) {
                return $stock->entry_type == "IV" ? StatusRepository::getIssueStatus($stock->issue_status) : StatusRepository::getReceiveStatus($stock->receive_status);

            })
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/stock/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                if ($stock->entry_type == 'RV' && $stock->receive_status == StatusRepository::getReceiveStatus('approved')) {
                    $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url("store/dashboards/qm/receive-requests/$stock->id/receive").'\')" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Receive Item</a>';
                }
                if ($stock->entry_type == 'IV' && $stock->issue_status == StatusRepository::getIssueStatus('approved')) {
                    $str .= '&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES,
                            'UTF-8').'" onclick="prepareEdit(this,\'issueRequests\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Issue</a>';
                }

                return $str;
            })->make();
    }
}
