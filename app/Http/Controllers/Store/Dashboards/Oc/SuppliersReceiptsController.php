<?php

namespace App\Http\Controllers\Store\Dashboards\Oc;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use function request;

class SuppliersReceiptsController extends Controller
{
    public function index()
    {
        return view($this->folder.'supplier_receipts');
    }

    public function approve($stockID)
    {
        $stock = Stock::findOrFail($stockID);
        $stock->receive_status = StatusRepository::getReceiveStatus('approved');
        $stock->save();

        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock Approved successfully']);
    }

    public function decline()
    {
        $stock = Stock::findOrFail(request('id'));
        $stock->receive_status = StatusRepository::getReceiveStatus('declined');
        $stock->remarks = request('reason_for_declining');
        $stock->save();
        return redirect()->back()->with('notice',
            ['type' => 'success', 'message' => 'Stock addition declined successfully']);
    }

    public function listSuppliedStocks()
    {
        $stocks = Stock::join('spare_parts', 'spare_parts.id', 'stocks.spare_part_id')
            ->where([
                ['stocks.entry_type', 'RV'],
                ['stocks.account_issued', 'store'],
                ['stocks.receive_status', StatusRepository::getReceiveStatus('processing')],
            ])->select('stocks.*', 'spare_parts.part_number', 'spare_parts.description');


        if (request('all')) {
            return $stocks->get();
        }
        return SearchRepo::of($stocks)
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/spareparts/".$stock->spare_part_id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url("store/dashboards/oc/supplier-receipts/$stock->id/approve").'\')" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Approve</a>';
                $str .= '&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES,
                        'UTF-8').'" onclick="prepareEdit(this,\'declineReason\');" class="btn badgeButton btn-danger btn-sm"><i class="fa fa-edit"></i>Decline</a>';

                return $str;
            })->make();
    }
}
