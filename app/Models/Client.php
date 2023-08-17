<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes;
     protected $table='clients';
    protected $fillable = [
        'company_id',
        'branch_id',
        'Fullname',
        'phonenumber',
        'Registered_date',
        'address',
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
