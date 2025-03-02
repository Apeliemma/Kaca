<?php

namespace App\Http\Controllers\Store\Reports;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\StockRecordSheet;
use App\Models\Core\Store;
use App\Repositories\SearchRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NilPartsController extends Controller
{
    public function index(){
        $stores = [];
        if (auth()->user()->isAllowedTo('commanding_officer') )
            $stores = Store::select('id','name')->get();

        if (\request('date')){
            $travelDates = explode('-', \request('date'));
            $startDate = Carbon::parse($travelDates[0])->startOfDay();
            $endDate = Carbon::parse($travelDates[1])->endOfDay();
            $nilSpareParts = SparePart::join('store_parts','store_parts.spare_part_id','spare_parts.id')
            ->where([
                 ['store_parts.quantity',0],
                 ['store_parts.store_id',auth()->user()->store_id]
             ])->whereBetween('store_parts.updated_at',[$startDate, $endDate])
                 ->get();
//          dd(\request()->date);
            return view($this->folder.'forms.nil_parts_results',[
                'nilSpareParts'=> $nilSpareParts
            ]);
        }

        return view($this->folder.'nil_parts',[
            'stores' => $stores
        ]);
    }

    /**
     * return sparepart values
     */
    public function listSpareParts(){
        $spareparts = SparePart::join('store_parts','store_parts.spare_part_id','spare_parts.id')
        ->where([
            ['store_parts.quantity',0],
            ['store_parts.store_id',auth()->user()->store_id]
        ])->select('spare_parts.*','store_parts.quantity','store_parts.store_id','store_parts.unsvc_quantity','store_parts.svc_quantity');

        if (\request('store'))
        {
            if (\request('store') == 'all')
                $spareparts = SparePart::join('store_parts','store_parts.spare_part_id','spare_parts.id')
                 ->where([
                    ['store_parts.quantity',0],
                ])->select('spare_parts.*','store_parts.quantity','store_parts.unsvc_quantity','store_parts.svc_quantity','store_parts.store_id');
            else
                $spareparts = SparePart::join('store_parts','store_parts.spare_part_id','spare_parts.id')
                ->where([
                    ['store_parts.quantity',0],
                    ['store_parts.store_id',\request('store')],
                ])->select('spare_parts.*','store_parts.quantity','store_parts.store_id','store_parts.unsvc_quantity','store_parts.svc_quantity');
        }

        if(\request('all'))
            return $spareparts->get();

        return SearchRepo::of($spareparts)
            ->addColumn('action',function($sparepart){
                $str = '';
                $json = json_encode($sparepart);
                $str.='<a href="'.url("store/stocks/spareparts/edit/".$sparepart->id).'" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/spareparts/delete').'\',\''.$sparepart->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                $str.='&nbsp;&nbsp;<a href="'.url("store/stocks/spareparts/".$sparepart->id."?receive_from_supplier=1&").'"  class="btn badge btn-primary btn-sm"><i class="fa fa-edit"></i> Receive From Supplier</a>';

                return $str;
            })->make();
    }
}
