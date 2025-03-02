<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StorePart extends Model
 {
	protected $fillable = ["spare_parts_id","store_id","svc_quantity","unsvc_quantity","location_id"];

    use HasFactory;

    public function sparePart(){
        return $this->belongsTo(SparePart::class);
    }
//TODO set location for store part
    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function scopeUserStore(Builder $query): void
    {
        $query->where('store_id',  auth()->user()->store_id);
    }
}
