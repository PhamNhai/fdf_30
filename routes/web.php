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

Route::group(['prefix' => 'admin', 'middleware' => ['check.auth', 'check.admin']], function () {
    Route::get('home', function () {
        return view('admin.master');
    });
    Route::resource('product', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('suggest', 'Admin\SuggestController');
    Route::get('user/set-admin/{userId}', [
        'as' => 'user.set-admin',
        'uses' => 'Admin\UserController@setAdmin',
    ]);
    Route::get('/update-status/{userId}', [
        'as' => 'product.status',
        'uses' => 'Admin\ProductController@updateStatus'
    ]);
});

Route::get('/', [
    'as' => 'frontend.product',
    'uses' => 'Frontend\ProductController@index',
    App::setLocale('vn'),
]);

Route::group(['middleware' => 'check.auth'], function () {
    App::setLocale('vn');
    Route::resource('profile', 'User\UserController');
    Route::resource('comment', 'User\CommentController');
    Route::get('comment/{commentId}/delete', [
        'as' => 'comment.delete',
        'uses' => 'User\CommentController@destroy',
    ]);
    Route::post ( '/editComment', 'User\CommentController@updateComment' );
    Route::resource('rate', 'RateController', [
        'only' => ['store']
    ]);
});



Route::get('product-deltais/{id}', [
    'as' => 'frontend.product-deltais',
    'uses' => 'Frontend\ProductController@productDetails',
    App::setLocale('vn'),
]);

Route::get('shopping-cart/{id}', [
    'as' => 'shopping',
    'uses' => 'Frontend\ProductController@shopping',
    App::setLocale('vn'),
]);

Route::get('cart', ['as' => 'cart', 'uses' => 'Frontend\ProductController@cart']);

Route::get('remove-product-cart/{id}', [
    'as' => 'remove-product',
    'uses' => 'Frontend\ProductController@removeProduct'
]);

Route::post('order', ['as' => 'order', 'uses' => 'Frontend\ProductController@order'])->middleware('check.auth');

Route::get('product-category/{id}', [
    'as' => 'product-category',
    'uses' => 'Frontend\FilterController@productCategory',
]);

Route::get('product-filter', [
    'as' => 'product-filter',
    'uses' => 'Frontend\FilterController@filterProduct',
]);

Route::get('product-filter-category', [
    'as' => 'product-filter-category',
    'uses' => 'Frontend\FilterController@filterProductCategory',
]);

Route::get('update-cart/{id}/{qty}', [
    'as' => 'update',
    'uses' => 'Frontend\ProductController@update',
]);

Route::get('suggest', [
    'as' => 'suggest',
    'uses' => 'Frontend\SuggestController@index',
]);

Route::post('suggest', [
    'as' => 'post.suggest',
    'uses' => 'Frontend\SuggestController@postSuggest',
]);

Route::post('search', [
    'as' => 'search-frontend',
    'uses' => 'Frontend\SearchController@index',
]);
