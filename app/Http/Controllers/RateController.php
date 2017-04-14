<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;

class RateController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $inputs = $request->only('product_id', 'rate', 'user_id');
            $rating = Rating::where('product_id', $inputs['product_id'])->where('user_id', $inputs['user_id'])->first();
            if ($rating) {
                $product =Product::findOrFail($inputs['product_id']);
                $oldRate = $rating['rate'];
                $product['rate'] = ( $product['sum_rate'] * $product['rate'] - $oldRate + $inputs['rate'] ) / $product['sum_rate'];
                $product->save();
                Rating::where('product_id', $inputs['product_id'])
                    ->where('user_id', $inputs['user_id'])
                    ->update($inputs);
            } else {
                $product =Product::findOrFail($inputs['product_id']);
                $product['rate'] = ( $product['sum_rate'] * $product['rate'] + $inputs['rate'] ) / ( $product['sum_rate'] + 1 );
                $product['sum_rate'] = $product['sum_rate'] + 1;
                $product->save();
                Rating::create($inputs);
            }
        }
    }
}
