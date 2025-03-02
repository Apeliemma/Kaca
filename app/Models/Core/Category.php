<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
 {
	protected $fillable = ["name","slug","user_id"];

    use HasFactory;
}
