<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $req = $request['request'];
            $productSearch = Product::where('name', 'like', '%' . $req . '%')->get();
            if ($productSearch->count()) {
                return view('frontend.product', compact('productSearch', 'req'));
            }

           return redirect()->route('frontend.product')->with([
                'flash_level' => 'warning',
                'flash_message' => trans('frontend.product-relationship-none'),
            ]);;
        } catch (Exception $e) {
            return back()->with([
                'flash_level' => 'warning',
                'flash_message' => trans('frontend.error-search'),
            ]);
        }
    }
}
