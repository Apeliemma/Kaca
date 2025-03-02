<?php

namespace App\Http\Controllers\Technician\Stores\Items;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(int $stockID){
        return view($this->folder.'stock',[
            'stock' => Stock::whereId($stockID)->where('user_id',auth()->id())->firstOrFail()
        ]);
    }
}
