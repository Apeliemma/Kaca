<?php

namespace App\Http\Controllers\Store\Lpos;

use App\Http\Controllers\Controller;
use App\Models\Core\Lpo;
use App\Models\Core\SparePart;
use App\Repositories\SearchRepo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    /**
     * return sparepart values
     */
    public function listSparePartsLpos($state){
        if($state == 'with_lpos')
            return $this->withLpos();

        $sparepartsIds = Lpo::whereNotNull('spare_part_id')->pluck('spare_part_id');
        $spareparts = SparePart::whereNotIn('id',$sparepartsIds)
            ->select('spare_parts.*');
        if(\request('all'))
            return $spareparts->get();
        return SearchRepo::of($spareparts)
            ->addColumn('action',function($sparepart){
                $str = '';
                $json = json_encode($sparepart);
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/spareparts/delete').'\',\''.$sparepart->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                $str.='<a href="'.url("store/stocks/spareparts/".$sparepart->id).'" class="btn badge btn-secondary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'add_lpo\');" class="btn badge btn-info btn-sm"><i class="fa fa-plus"></i> Add LPO</a>';

                return $str;
            })->make();
    }

    /**
     * @return mixed
     * Spare Parts which has an LPO - Local Purchase Order
     */
    private function withLpos(){
        $spareparts = SparePart::join('lpos','lpos.spare_part_id','spare_parts.id')
        ->select('spare_parts.*','lpos.number as lpo_number');

        if(\request('all'))
            return $spareparts->get();
        return SearchRepo::of($spareparts)
            ->addColumn('action',function($sparepart){
                $str = '';
                $json = json_encode($sparepart);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'sparepart_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                return $str;
            })->make();

    }
}
