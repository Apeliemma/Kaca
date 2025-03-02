<?php

namespace App\Http\Controllers\Store\Issuing;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Traits\StocksIssuingTrait;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use StocksIssuingTrait;
    public function loanItem(){
        \request()->merge(['form_model'=>Stock::class]);
        \request()->validate($this->getValidationFields(['technician','state']));
//         dd(\request()->all());
        $stock= new Stock();
        $stock->spare_part_id = \request('id');
        $stock->entry_type = 'IV';
        $stock->account_issued = 'technician';
        $stock->issue_type = 'TL';
        $stock->state = \request('state');
        $stock->issued_to = \request('technician');
        $stock->received_by = \request('technician'); // its presumed you are given an item on tloan while in store
        $stock->quantity = 1;
        $stock->store_id = auth()->user()->store_id;
        $stock->user_id = auth()->id();
        $stock->save();

        return $this->decrementStockQuantity($stock->id);

    }
}
