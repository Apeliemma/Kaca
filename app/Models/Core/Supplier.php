<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
 {
	protected $fillable = ["name","email","phone","location","address","user_id"];

    use HasFactory;

    public function lpos(){
        return $this->hasMany(Lpo::class);
    }
}
