<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDeTail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;
use File;

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

    public function orderDetail()
    {
        return $this->hasOne(OrderDeTail::class);
    }

    public function category()
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

    public function scopeDeleteProduct($query, $id)
    {
        $product = $query->find($id);
        if ($product) {
            File::delete(config('app.image_path')
                . '/' . $product['image']);
            $product->delete();

            return true;
        }
        return false;
    }
}
