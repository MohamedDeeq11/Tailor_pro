<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='products';
    protected $fillable = [
        'Registered_date',
        'name',
        'description',
        'price',
        'Unity',
        'product_category_id',
    ];

    public function product_category()
    {
        return $this->belongsTo(Product_Categorie::class);
    }
}
