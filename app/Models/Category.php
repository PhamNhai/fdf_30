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
        return $this->belongsTo(TypeCategory::class, 'type_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeCreateCategory($query, $data)
    {
        return $this->create($data);
    }
}
