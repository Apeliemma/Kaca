<?php

namespace App\Http\Controllers\Store\Issuing;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Traits\StocksReceivingTrait;
use function request;

class TloansController extends Controller
{
    // this two traits have conflict name resolution :)
    use StocksReceivingTrait;

    public function index()
    {
        return view($this->folder.'tloans');
    }

    public function returnItem($stockID)
    {
        $this->updateStockQuantity($stockID);

        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock returned successfully']);

    }


    public function listTloans()
    {
        $stocks = Stock::join('spare_parts', 'spare_parts.id', 'stocks.spare_part_id')
            ->where([
                ['stocks.entry_type', 'IV'],
                ['stocks.issue_type', 'TL'],
                ['stocks.store_id', auth()->user()->store_id],
                ['stocks.account_issued', 'technician'],
            ])->select('stocks.*', 'spare_parts.part_number', 'spare_parts.description');

        if (request('all')) {
            return $stocks->get();
        }

        return SearchRepo::of($stocks)
            ->addColumn('date', function ($stock) {
                return $stock->date?->toDateString();
            })
            ->addColumn('status', function ($stock) {
                if (!$stock->date) {
                    return '<span class="legend-indicator bg-danger"></span> Not Returned';
                }

                return '<span class="legend-indicator bg-success"></span> Returned';
            })
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/spareparts/".$stock->spare_part_id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                if (!$stock->date) {
                    $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/issuing/tloans/return').'\',\''.$stock->id.'\');" class="btn badgeButton btn-success btn-sm"><i class="fa fa-check"></i> Return</a>';
                }
                $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/issuing/tloans/return').'\');" class="btn badgeButton btn-success btn-sm"><i class="fa fa-check"></i> Return</a>';
                return $str;
            })->make();
    }

}
