<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'check.auth'], function () {
    Route::get('home', function () {
        return view('admin.master');
    });
    Route::resource('product', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('suggest', 'Admin\SuggestController');
});

Route::get('/', function () {
    App::setLocale('vn');
    return view('frontend.product');
});
Route::get('product-deltais', function () {
    App::setLocale('vn');
    return view('frontend.product_details');
});

Route::get('cart', function () {
    App::setLocale('vn');
    return view('frontend.cart');
});
