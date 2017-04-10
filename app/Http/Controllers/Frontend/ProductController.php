<?php

namespace App\Http\Controllers\Frontend;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use View;

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
        $id = $request::instance()->id;
        $product_buy = Product::findOrFail($id);
        if (!$request::instance()->quantity) {
            $quantity = 1;
        } else {
            $quantity = $request::instance()->quantity;
        }
        Cart::add(array(
            'id' => $product_buy->id,
            'name' => $product_buy->name,
            'quantity' => $quantity,
            'price' => $product_buy->price,
            'attributes' => array('image' => $product_buy->image,)
            ));

        return back();
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

    public function order(Request $request)
    {
        $input['user_id'] = $request::instance()->user_id;
        $input['status'] = config('app.status_order_default');
        $input['price'] = Cart::getSubTotal();
        $input['ship_address'] = $request::instance()->address;

        $order = Order::create($input);
        $products = $request::instance()->products;
        foreach($products as $item) {
            $data['order_id'] = $order->id;
            $data['product_id'] = $item["'id'"];
            $data['quantity'] = $item["'quantity'"];
            $data['price'] = $item["'price'"];
            OrderDetail::create($data);
            Cart::clear();
        }

        return redirect()->route('frontend.product')->with([
        'flash_level' => 'success',
        'flash_message' => trans('frontend.order-success'),
        ]);
    }

    public function update()
    {
        if (Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $qty,
                ],
            ]);
        }

        return response()->json([
            'flash_level' => 'success',
            'flash_message' => trans('frontend.order-success'),
            'flash_data' => true,
        ]);
    }
}
