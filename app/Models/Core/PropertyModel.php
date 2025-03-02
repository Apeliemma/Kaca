<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
 {
	protected $fillable = ["property_id","name","description"];

    use HasFactory;
}
