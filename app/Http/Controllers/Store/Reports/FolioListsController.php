<?php

namespace App\Http\Controllers\Store\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FolioListsController extends Controller
{
    public function index(){
        return view($this->folder.'folio_lists');
    }
}
