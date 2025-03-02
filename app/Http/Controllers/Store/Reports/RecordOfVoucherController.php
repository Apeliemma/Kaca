<?php

namespace App\Http\Controllers\Store\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\RecordOfVoucher;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class RecordOfVoucherController extends Controller
{
            /**
         * return recordofvoucher's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }
//
//    /**
//     * store recordofvoucher
//     */
//    public function storeRecordOfVoucher(){
//        request()->validate($this->getValidationFields());
//        $data = \request()->all();
//        if(!isset($data['user_id'])) {
//            if (Schema::hasColumn('recordofvouchers', 'user_id'))
//                $data['user_id'] = request()->user()->id;
//        }
//         if(\request()->id){
//             $action="updated";
//          }else{
//            $action="saved";
//         }
//        $this->autoSaveModel($data);
//        return redirect()->back()->with('notice',['type'=>'success','message'=>'RecordOfVoucher '.$action.' successfully']);
//    }

    /**
     * return recordofvoucher values
     */
    public function listRecordOfVouchers(){
        $recordofvouchers = RecordOfVoucher::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $recordofvouchers->get();
        return SearchRepo::of($recordofvouchers)
            ->addColumn('action',function($recordofvoucher){
                $str = '';
                $json = json_encode($recordofvoucher);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'recordofvoucher_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
            //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/recordofvouchers/delete').'\',\''.$recordofvoucher->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete recordofvoucher
     */
    public function destroyRecordOfVoucher($recordofvoucher_id)
    {
        $recordofvoucher = RecordOfVoucher::findOrFail($recordofvoucher_id);
        $recordofvoucher->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'RecordOfVoucher deleted successfully']);
    }

}
