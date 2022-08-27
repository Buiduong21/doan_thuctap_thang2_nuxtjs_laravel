<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
 
    protected $fillable = ['total', 'order_date', 'order_number', 'customer_address', 'customer_email', 'customer_name', 'customer_phone', 'created_at', 'updated_at'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details');
    }
}