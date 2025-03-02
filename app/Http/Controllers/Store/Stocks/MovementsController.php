<?php

namespace App\Http\Controllers\Store\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class MovementsController extends Controller
{
    public function index(){

        return view($this->folder.'movements',[

        ]);
    }

    public function listStocksMovement(){
        $stocks = Stock::join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->leftJoin('aircraft','aircraft.id','stocks.aircraft_id')
            ->leftJoin('stores','stores.id','stocks.store_id')
            ->leftJoin('suppliers','suppliers.id','stocks.supplier_id')

            ->where(function ($query){
                $query->where([
                    ['stocks.entry_type','IV'],
                    ['stocks.store_id',auth()->user()->store_id]
                ])->whereIn('issue_status',StatusRepository::getIssueStatus(['qm-issued','mo-declined','qm-declined','declined']));
            })
            ->orWhere(function ($query){
                $query->where([
                    ['stocks.entry_type','RV'],
                    ['stocks.store_id',auth()->user()->store_id]
                ])->whereIn('receive_status',StatusRepository::getReceiveStatus(['received','mo-declined','qm-declined','declined']));
            })
            ->select('stocks.*','stores.name as storeName','suppliers.name as supplier','aircraft.tail_number as aircraft_or_status','spare_parts.part_number','spare_parts.description');







        if(\request('all'))
            return $stocks->get();

        return SearchRepo::of($stocks)
            ->addColumn('issued_by',function($stock){
                // A store can only issue to technician and supplier
                if ($stock->account_issued == 'tech' || $stock->account_issued == 'technician' || $stock->account_issued == 'supplier' || $stock->issue_type == 'TL')
                    return $stock->storeName;

                // technician on issuing to store has to select aircraft
                if ($stock->account_issued == 'store' && $stock->aircraft_id)
                    return 'Tech';

                return $stock->supplier;
            })
            ->addColumn('received_by',function($stock){
                if ($stock->account_issued == 'store')
                    return $stock->storeName;

                if ($stock->account_issued == 'supplier')
                    return $stock->supplier ?? 'supplier';

                return 'Tech';
            })
            ->addColumn('aircraft_or_status',function($stock){
                 $response= $stock->aircraft_or_status;
                 if ($stock->entry_type == 'IV')
                     return $response.'&nbsp;'.StatusRepository::getIssueStatus($stock->issue_status);
                 return $response.'&nbsp;'.StatusRepository::getReceiveStatus($stock->receive_status);
            })
            ->addColumn('action',function($stock){
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("store/stocks/stock/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';

//                $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('store/issuing/requests/issue').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Issue</a>';
                return $str;
            })->make();
    }
}
