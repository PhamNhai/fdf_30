<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'content',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
