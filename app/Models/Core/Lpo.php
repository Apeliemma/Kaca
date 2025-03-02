<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpo extends Model
 {
	protected $fillable = ["number","quantity","date","type","delivery_date","user_id","status"];
    protected $casts = [
        'delivery_date' => 'datetime:Y-m-d',
    ];
    use HasFactory;

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
