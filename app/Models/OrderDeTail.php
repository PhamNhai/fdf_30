<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDeTail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
