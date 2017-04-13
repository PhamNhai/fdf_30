<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Comment;
use Cart;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(config('view.product_per_page'));

        return view('frontend.product', compact('product'));
    }

    public function productDetails($id)
    {
        $comments = Comment::where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('view.comment_per_page'));
        $product = Product::findOrFail($id);
        $value = Product::isRatedProduct($id);
        $userRateValue = $value =='not rate' ? 0 : $value;

        return view('frontend.product_details', compact('product', 'userRateValue', 'comments'));
    }

    public function shopping(Request $request)
    {
        $id = $request->id;
        $product_buy = Product::findOrFail($id);
        if (!$request->quantity) {
            $quantity = 1;
        } else {
            $quantity = $request->quantity;
        }
        Cart::add(array(
            'id' => $product_buy->id,
            'name' => $product_buy->name,
            'quantity' => $quantity,
            'price' => $product_buy->price,
            'attributes' => array('image' => $product_buy->image,)
            ));

        return redirect()->route('frontend.product');
    }

    public function cart()
    {
        $contents = Cart::getContent();
        $subTotal = Cart::getSubTotal();

        return view('frontend.cart', compact(['contents', 'subTotal']));
    }

    public function removeProduct($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }
}
