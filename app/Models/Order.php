<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
     
          'fname',
          'lname',
          'email',
          'mobile',
          'address1',
          'address2',
          'city',
          'country',
          'state',
          'pincode',
          'status',
          'message',
          'tracking_no'
    ];
}
