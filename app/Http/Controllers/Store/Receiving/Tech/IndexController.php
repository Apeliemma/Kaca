<?php

namespace App\Http\Controllers\Store\Receiving\Tech;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\Traits\StocksReceivingTrait;
use function request;

class IndexController extends Controller
{
    use StocksReceivingTrait;

    public function index()
    {
        return view($this->folder.'index');
    }

    public function receive($stockID)
    {
        $this->updateStockQuantity($stockID);

        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock Received successfully']);
    }

    public function listIssuedStocks($status)
    {
        $stocks = Stock::join('aircraft', 'aircraft.id', 'stocks.aircraft_id')
            ->join('spare_parts', 'spare_parts.id', 'stocks.spare_part_id')
            ->where([
                ['stocks.entry_type', 'RV'],
                ['stocks.store_id', auth()->user()->store_id],
                ['stocks.receive_status', StatusRepository::getReceiveStatus($status)],
                // list received items from tech only
            ])
            ->select('stocks.*', 'aircraft.tail_number as tail_number', 'spare_parts.part_number',
                'spare_parts.description');

        if (request('all')) {
            return $stocks->get();
        }

        return SearchRepo::of($stocks)
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/stock/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                // For technician issuing item to store
                if ($stock->issue_status == StatusRepository::getIssueStatus('approved')) {
                    $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/receiving/tech/receive').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Receive</a>';
                }

                return $str;
            })->make();
    }
}
