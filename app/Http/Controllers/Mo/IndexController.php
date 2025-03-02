<?php

namespace App\Http\Controllers\Mo;

use App\Http\Controllers\Controller;
use App\Library\Stats\MoDashboard;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index',[
            'data' => MoDashboard::displayStats()
        ]);
    }
}
