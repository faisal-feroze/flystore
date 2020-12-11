<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','Api\Auth\LoginController@login');

Route::post('/registration','Api\Auth\RegisterController@register');

Route::middleware('auth:api')->get('/logout','Api\Auth\LoginController@logout');

Route::middleware('auth:api')->get('/me','Api\Auth\LoginController@me');

Route::middleware('auth:api')->get('/refresh','Api\Auth\LoginController@refresh');

Route::get('/get/all/products','Api\Home\ProductController@all_products');

Route::post('/get/product_details','Api\Home\ProductController@product_details');

Route::post('/get/products','Api\Home\ProductController@pagination_products');

// Route::get('/get/category','Api\Home\ProductController@all_products');

Route::get('/get/category','Api\Home\ProductController@all_category');

Route::post('/get/category/items','Api\Home\ProductController@category_items');

Route::post('/add/to/cart','Api\CartController@addToCart');

Route::get('/show/cart','Api\CartController@show_cart');

Route::middleware('auth:api')->post('/update/profile','Api\Auth\LoginController@profile_update');

// Route::post('/set/cookie','Api\CartController@set_cookie');
// Route::get('/get/cookie','Api\CartController@get_cookie');

Route::post('/add/to/cart','Api\CartController@add_to_cart');
Route::get('/show/cart','Api\CartController@show_cart');
Route::get('/delete/cart','Api\CartController@clear_cart');
Route::post('/delete/cart_item','Api\CartController@delete_cart_item');


Route::middleware('auth:api')->post('/purchase','Api\CartController@purchase');

Route::middleware('auth:api')->post('/add/to/wishlist','Api\CartController@add_to_wishlist');

Route::middleware('auth:api')->get('/my/wishlist','Api\CartController@my_wishlist');
