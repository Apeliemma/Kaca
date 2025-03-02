<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
 {
	protected $fillable = ["log_type_id","user_id"];

    use HasFactory;
}
