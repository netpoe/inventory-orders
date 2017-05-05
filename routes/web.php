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

Route::get('/', 'ProductsController@index')->name('products:index');
Route::get('/products/create', 'ProductsController@create')->name('products:create');

Route::get('/brands', 'BrandsController@index')->name('brands:index');
Route::get('/brands/create', ['middleware' => 'auth', 'uses' => 'BrandsController@create'])->name('brands:create');
Route::post('/brands/store', 'BrandsController@store')->name('brands:store');

Route::get('/front/products', 'FrontController@index')->name('front:index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard/orders', 'OrdersController@index')->name('orders:index');
