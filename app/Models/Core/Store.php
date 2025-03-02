<?php

namespace App\Models\Core;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
 {
	protected $fillable = ["name"];

    use HasFactory;

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
