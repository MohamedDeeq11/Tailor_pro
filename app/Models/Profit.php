<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profit extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='profits';
    protected $fillable = [
        'profit_name',
        'total',
    ];
}
