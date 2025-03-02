<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
 {
	protected $fillable = ["name","slug","user_id"];

    use HasFactory;
}
