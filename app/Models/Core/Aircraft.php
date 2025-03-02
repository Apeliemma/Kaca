<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
 {
	protected $fillable = ["property_model_id","model","tail_number","serial_number","engine_model"];

    use HasFactory;
}
