<?php

namespace App\Models\Core;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordOfVoucher extends Model
 {
	protected $fillable = ["user_id","vnumber","entry_type","store_id","aircraft_id","supplier_id","technician_id"];

    use HasFactory;

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function technician(){
        return $this->belongsTo(User::class,'technician_id');
    }
}
