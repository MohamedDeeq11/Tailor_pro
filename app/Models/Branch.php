<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='branchs';
    protected $fillable = [
        'company_id',
        'branch_name',
        'phone_number',
        'address',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    protected $hidden = [
        'company_id',
    ];
}
