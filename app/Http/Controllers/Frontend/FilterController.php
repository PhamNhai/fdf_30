<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FilterController extends Controller
{
    public function productCategory($id)
    {
        $productCategory = Product::where('category_id', $id)->get();
        $cateId = $id;

        return view('frontend.product', compact('productCategory', 'cateId'));
    }

    public function filterProduct(Request $request) {
        if ($request->filter == 'pr') {
            $productByPrice = Product::orderBy('price', 'asc')->get();

            return view('frontend.product', compact('productByPrice'));
        } elseif ($request->filter == 'new') {
            $productByDate = Product::orderBy('created_at', 'desc')->get();

            return view('frontend.product', compact('productByDate'));
        }
    }

    public function filterProductCategory(Request $request) {
        $cateId = $request->cateId;
        if ($request->filter == 'pr') {
            $productCategoryByPrice = Product::orderBy('price', 'asc')->where('category_id', $cateId)->get();

            return view('frontend.product', compact('productCategoryByPrice', 'cateId'));
        } elseif ($request->filter == 'new') {
            $productCategoryByNew = Product::orderBy('created_at', 'desc')->where('category_id', $cateId)->get();

            return view('frontend.product', compact('productCategoryByNew', 'cateId'));
        }
    }
}
