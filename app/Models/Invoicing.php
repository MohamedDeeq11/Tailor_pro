<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invoicing extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='invoicings';
    protected $fillable = [
        'company_id',
        'From',
        'Registered_date',
        'To',
        'product',
        'price',
        'PaymentStatus',
        'PaymentMethod',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
