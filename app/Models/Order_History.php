<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order_History extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='order_historys';
    protected $fillable = [
        'date',
        'product',
        'price',
    ];
}
