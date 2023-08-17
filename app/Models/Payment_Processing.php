<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payment_Processing extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='payment_processings';
    protected $fillable = [
        'payment_method_Name',
        'Number',
        'payment_status',
    ];
}
