<?php

namespace App\Models;

use App\Models\Core\PermissionGroup;
use App\Models\Core\Stock;
use App\Models\Core\Store;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'permission_group_id',
        'store_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAllowedTo($slug){
        $department = $this->permissionGroup;
//        return $department;
        if(!$department)
            return false;
        $permissions = json_decode($department->permissions);
        if(in_array($slug,$permissions))
            return true;
        return false;
    }
    public function permissionGroup(){
        return $this->belongsTo(PermissionGroup::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function isTechnician() :bool {
        return $this->role == 'technician';
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
