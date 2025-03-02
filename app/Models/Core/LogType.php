<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogType extends Model
 {
	protected $fillable = ["title","slug","description","user_id"];

    use HasFactory;
}
