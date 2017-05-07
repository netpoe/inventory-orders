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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductsController@index')->name('products:index');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/front/products/create', 'ProductsController@create')->name('front:products:create');
    Route::post('/front/products/store', 'ProductsController@store')->name('front:products:store');
    Route::get('/front/products', 'FrontController@index')->name('front:products:index');
});

Route::get('/cart', 'ProductsCartController@index')->name('cart:index');
Route::get('/cart/store/{product}', 'ProductsCartController@store')->name('cart:store');
Route::post('/cart/set-products-amount', 'ProductsCartController@setProductsAmount')->name('cart:set-products-amount');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/front/orders', 'OrdersController@index')->name('front:orders:index');
    Route::get('/orders/confirmation', 'OrdersController@confirmation')->name('front:orders:confirmation');
    Route::post('/orders/store', 'OrdersController@store')->name('front:orders:store');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/front/brands', 'BrandsController@index')->name('front:brands:index');
    Route::get('/front/brands/create', 'BrandsController@create')->name('front:brands:create');
    Route::post('/front/brands/store', 'BrandsController@store')->name('front:brands:store');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard/orders', 'OrdersController@index')->name('dashboard:orders:index');
});
