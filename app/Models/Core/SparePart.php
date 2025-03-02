<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    protected $fillable = [
        "part_number", "serial_number", "description", "unit_of_account", "category_id", "department_id",
        "warranty_date", "expiry_date", "control_level", "reorder_level", "remarks"
    ];

    protected $dates = ['warranty_date', 'expiry_date'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'warranty_date' => 'datetime:Y-m-d',
    ];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function propertyModel()
    {
        return $this->belongsTo(PropertyModel::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function storeParts()
    {
        return $this->hasMany(StorePart::class);
    }

}
