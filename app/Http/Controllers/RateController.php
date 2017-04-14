<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RateController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $inputs = $request->only('product_id', 'rate', 'user_id');
            $rating = Rating::where('product_id', $inputs['product_id'])->where('user_id', $inputs['user_id'])->first();
            if ($rating) {
                Rating::where('product_id', $inputs['product_id'])
                    ->where('user_id', $inputs['user_id'])
                    ->update($inputs);
            } else {
                Rating::create($inputs);
            }
        }
    }
}
