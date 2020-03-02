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

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('product/{product}','FrontEndController@show')->name('product.single');
Route::post('cart/add','ShoppingController@addToCart')->name('cart.add');
Route::get('cart','ShoppingController@cart')->name('cart.show');
Route::get('cart/{id}/delete','ShoppingController@cartDelete')->name('cart.delete');
Route::get('cart/{id}/{qty}/incr','ShoppingController@incr')->name('cart.incr');
Route::get('cart/{id}/{qty}/decr','ShoppingController@decr')->name('cart.decr');
Route::get('cart/quick/add/{id}','ShoppingController@quickAdd')->name('cart.quick.add');



Route::get('cart/checkout','CheckoutController@index')->name('cart.checkout');
Route::post('cart/checkout','CheckoutController@pay')->name('cart.checkout.pay');

Route::resource('products','ProductsController');


Auth::routes();

Route::get('/home', 'ProductsController@index')->name('home');
