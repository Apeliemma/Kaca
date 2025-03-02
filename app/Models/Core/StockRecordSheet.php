<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockRecordSheet extends Model
{
    protected $fillable = ["stock_id","user_id","balance_in_stock","quantity"];

    use HasFactory;

    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
