<?php

namespace App\Models\Core;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
 {
	protected $fillable = ["spare_part_id","quantity","entry_type","issue_status","receive_status","issue_type","aircraft_id","reference","reason","issued_to","issued_by","received_by","issued_to"];

    protected $dates = ['date'];
    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];
    use HasFactory;

    public function sparePart(){
        return $this->belongsTo(SparePart::class);
    }
    public function aircraft(){
        return $this->belongsTo(Aircraft::class);
    }
    public function maintenanceOfficer(){
        return $this->belongsTo(User::class,'mo_id');
    }

    public function issuedBy(){
        return $this->belongsTo(User::class,'issued_by');
    }

    public function receivedBy(){
        return $this->belongsTo(User::class,'received_by');
    }
    public function supplier(){
        if ($this->supplier_id)
            return $this->belongsTo(Supplier::class);

        return $this->belongsTo(Supplier::class,'issued_to');
    }

    public function lpo(){
        return $this->belongsTo(Lpo::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recordOfVoucher(){
        return $this->belongsTo(RecordOfVoucher::class);
    }

    public function stockRecordSheet(){
       return $this->hasOne(StockRecordSheet::class);
    }
}
