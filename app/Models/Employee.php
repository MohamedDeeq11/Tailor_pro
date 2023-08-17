<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='employees';
    protected $fillable = [
        'company_id',
        'branch_id',
        'name',
        'phonenumber',
        'Status',
        'AccessToAllBranchs',
        'address',
        'position',
        'Registered_date',
        'Refrence_Name',
        'Refrance_phone',
        'Refrance_relation',
        'Refrance_address',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
   public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
