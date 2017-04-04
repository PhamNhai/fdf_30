<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use File;
use App\Helpers\CheckFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(config('view.product_per_page'));

        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');

        return view('admin.products.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $input = $request->only('name', 'category_id', 'description', 'quantity', 'price', 'status');
            $name = CheckFile::uploadImage($request);
            if ($name != null) {
                $input['image'] = $name;
            } else {
                $input['image'] = null;
            }
            Product::create($input);

            return redirect()->route('product.index')->with([
                'flash_level' => 'success',
                'flash_message' => trans('admin.add-product-success'),
            ]);
        } catch (Exception $e) {
            return redirect()->route('product.index')->with([
                'flash_level' => 'warning',
                'flash_message' => trans('admin.add-product-fail'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id');
        if ($product) {
            return view('admin.products.edit', compact('product', 'categories'));
        }

        return redirect()->route('product.index')->with([
            'flash_level' => 'warning',
            'flash_message' => trans('admin.product-not-found'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->status = $request->status;
            $name = CheckFile::uploadImage($request);
            if ($name) {
                $product->image = $name;
                file::delete(config('app.image_path') . '/' . $request->current_img);
            } else {
                $product->image = $request->current_img;
            }

            $product->save();

            return redirect()->route('product.index')->with([
                'flash_level' => 'success',
                'flash_message' => trans('admin.update-product-success'),
            ]);
        } catch (Exception $e) {
            return redirect()->route('product.index')->with([
                'flash_level' => 'warning',
                'flash_message' => trans('admin.update-product-fail'),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Product::deleteProduct($id);

        return redirect()->route('product.index')->with([
            'flash_level' => $response ? 'success' : 'warning',
            'flash_message' => $response ? trans('admin.product-deleted') :
                trans('admin.delete-product-fail'),
        ]);
    }
}
