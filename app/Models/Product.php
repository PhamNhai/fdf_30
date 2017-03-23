<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDeTail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
        'quantity',
        'rate',
        'price',
        'status',
        'sum_comment',
        'sum_rate',
    ];

    public function orderDetails()
    {
        return $this->hasOne(OrderDeTail::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
