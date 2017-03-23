<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'type_id',
        'name',
    ];

    public function typeCategory()
    {
        return $this->belongsTo(TypeCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
