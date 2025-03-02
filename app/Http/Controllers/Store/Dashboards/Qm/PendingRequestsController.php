<?php

namespace App\Http\Controllers\Store\Dashboards\Qm;

use App\Http\Controllers\Controller;
use App\Library\Traits\QmStocksTrait;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\Traits\StocksIssuingTrait;
use function request;

class PendingRequestsController extends Controller
{
    use StocksIssuingTrait, QmStocksTrait;

    public function index()
    {
        return view($this->folder.'pending_requests');
    }

    public function issueSupplier()
    {
        request()->merge(['form_model' => Stock::class]);
        request()->validate($this->getValidationFields(['issue_details']));
        $stockID = request('id');
        $stock = Stock::findOrFail($stockID);

        //TODO generate IV Number
        $stock->reference = request('issue_details');
        $stock->save();

        //TODO give to supplier
        $this->decrementStockQuantity($stockID);

        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'Stock Issued successfully']);
    }

    public function listPendingRequests()
    {
        $stocks = $this->fetchPendingQmRequests();

        return SearchRepo::of($stocks)
            ->addColumn('Status', function ($stock) {
                if ($stock->account_issued == 'technician') {
                    return 'Processing';
                }

                return $stock->entry_type == "IV" ? StatusRepository::getIssueStatus($stock->issue_status) : StatusRepository::getReceiveStatus($stock->receive_status);
            })
            ->addColumn('entry_date', function ($stock) {
                return $stock->created_at->toDateString();
            })
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/stock/".$stock->id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                if ($stock->account_issued == 'supplier' && $stock->issue_status == StatusRepository::getIssueStatus('approved')) {
                    $str .= '&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES,
                            'UTF-8').'" onclick="prepareEdit(this,\'issueToSupplier\');" class="btn badge btn-info btn-sm"> Issue to Supplier</a>';
                }

//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'lpo_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> View</a>';
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/lpos/delete').'\',\''.$lpo->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }
}
