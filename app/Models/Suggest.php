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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUpdateSuggest($query, $id)
    {
        $suggest = $query->findOrFail($id);
        if ($suggest->status) {
            $suggest->status = 0;
        } else {
            $suggest->status = 1;
        }
        $suggest->save();
    }
}
