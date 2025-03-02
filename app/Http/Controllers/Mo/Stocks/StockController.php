<?php

namespace App\Http\Controllers\Mo\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index($id){
         return view($this->folder.'view_stock',[
             'stock' => Stock::findOrFail($id)
         ]);
    }
}
