<?php

namespace App\Http\Controllers\Store\Receiving\Assd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }
}
