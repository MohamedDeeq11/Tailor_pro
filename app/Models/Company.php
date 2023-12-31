<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='companys';
    protected $fillable = [
        'Name',
        'LogoPic',
        'Registered_date',
        'Email',
        'website',
        'address',
    ];
}
