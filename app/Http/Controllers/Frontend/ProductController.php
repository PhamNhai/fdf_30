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
use DB;

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
        $productBuy = Product::findOrFail($id);
        if (!$request::instance()->quantity) {
            $quantity = 1;
        } else {
            $quantity = $request::instance()->quantity;
        }
        Cart::add(array(
            'id' => $productBuy->id,
            'name' => $productBuy->name,
            'quantity' => $quantity,
            'price' => $productBuy->price,
            'attributes' => array('image' => $productBuy->image,)
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
        try {
            $input['user_id'] = $request::instance()->user_id;
            $input['status'] = config('app.status_order_default');
            $input['price'] = Cart::getSubTotal();
            $input['ship_address'] = $request::instance()->address;

            DB::beginTransaction();
            $order = Order::create($input);
            $products = $request::instance()->products;
            $datas = [];
            foreach($products as $item) {
                $data['order_id'] = $order->id;
                $data['product_id'] = $item['id'];
                $data['quantity'] = $item['quantity'];
                $data['price'] = $item['price'];
                $datas[] = $data;
            }
            $orderDetail = OrderDetail::insert($datas);
            if ($orderDetail) {
                DB::commit();
                cart::clear();

                return redirect()->route('frontend.product')->with([
                    'flash_level' => 'success',
                    'flash_message' => trans('frontend.order-success'),
                ]);
            }
            DB::rollBack();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with([
                'flash_level' => 'warning',
                'flash_message' => trans('frontend.order-fail'),
            ]);
        }
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
