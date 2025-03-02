<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
 {
	protected $fillable = ["name","description","user_id"];

    use HasFactory;
}
