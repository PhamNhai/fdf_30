<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'price',
        'ship_address',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDeTail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
