<?php

namespace App\Http\Controllers\Store\Reports\Forms;

use App\Http\Controllers\Controller;
use App\Models\Core\RecordOfVoucher;
use Illuminate\Http\Request;

class FF7110Controller extends Controller
{
    public function index($rov_id){
        return view($this->folder.'ff7110',[
            'recordOfVoucher' => RecordOfVoucher::findOrFail($rov_id)
        ]);
    }
}
