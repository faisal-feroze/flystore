<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('index');

Route::get('/admin/all/products', 'AdminController@show_products')->name('show_products');

Route::get('/admin/add/products', 'AdminController@add_products')->name('add_products');

Route::post('/admin/save/products', 'AdminController@product_save')->name('product_save');

Route::get('/admin/edit/product/{id}', 'AdminController@product_edit')->name('product_edit');

Route::patch('/admin/update/product/{id}', 'AdminController@product_update')->name('product_update');

Route::get('/admin/show/category', 'AdminController@show_category')->name('show_category');

Route::patch('/admin/update/category/{id}', 'AdminController@category_update')->name('category_update');

Route::post('/admin/add/category', 'AdminController@add_category')->name('add_category');
