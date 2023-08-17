<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order_Detail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='order_details';
 protected $fillable = [
        'company_id',
        'branch_id',
        'client_id',
        'date',
        'product_id',
        'price',
        'Rodered_date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
   public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
  public function client()
    {
        return $this->belongsTo(Client::class);
    }
public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
