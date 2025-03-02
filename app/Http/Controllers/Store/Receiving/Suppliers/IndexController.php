<?php

namespace App\Http\Controllers\Store\Receiving\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Core\Lpo;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use function request;

class IndexController extends Controller
{
    public function index()
    {
        return view($this->folder.'index');
    }


    public function receiveParts()
    {
        request()->merge(['form_model' => Stock::class]);
        request()->validate($this->getValidationFields(['supplier_id', 'quantity', 'reason']));
        $lpo = Lpo::find(request('lpo'));
        $data = request()->all();
        $data['issued_by'] = $data['supplier_id'];

        $data['lpo_id'] = $lpo?->id ?? null;

        $data['store_id'] = auth()->user()->store_id;
        $data['user_id'] = auth()->id();
        $data['receive_status'] = StatusRepository::getReceiveStatus('processing');
        $data['account_issued'] = 'store';
        unset($data['lpo']);
        $this->autoSaveModel($data);

        return redirect('store/receiving/suppliers')->with('notice',
            ['type' => 'success', 'message' => 'Parts Received successfully']);
    }

    /**
     * return sparepart values
     */
    public function listSpareParts()
    {
        $spareparts = Stock::join('spare_parts', 'stocks.spare_part_id', 'spare_parts.id')
            ->leftJoin('suppliers', 'suppliers.id', 'stocks.supplier_id')
            ->where('stocks.account_issued', 'store')
            ->where('stocks.store_id', auth()->user()->store_id)
            ->whereNull('stocks.aircraft_id') // filters out request by technician to store
            ->select('stocks.*', 'suppliers.name as supplier', 'spare_parts.part_number', 'spare_parts.serial_number');
//        ->where([
//            ['id','>',0]
//        ]);
        if (request('all')) {
            return $spareparts->get();
        }
        return SearchRepo::of($spareparts)
            ->addColumn('action', function ($stock) {
                $str = '';
                $json = json_encode($stock);
                $str .= '<a href="'.url("store/stocks/stock/".$stock->id).'"  class="btn badge btn-info load-page btn-sm"> View Stock</a>';
                if ($stock->receive_status == StatusRepository::getReceiveStatus('processed')) {
                    $str .= '&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url("store/dashboards/qm/receive-requests/$stock->id/receive").'\')" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Receive Item</a>';
                }

                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/spareparts/delete').'\',\''.$sparepart->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })
            ->addColumn('Status', function ($stock) {
                return '
                  <span class="badge bg-soft-dark text-dark">
                    <span class="legend-indicator bg-dark"></span>'.StatusRepository::getReceiveStatus($stock->receive_status).'
                  </span>
                ';
            })
            ->make();
    }
}
