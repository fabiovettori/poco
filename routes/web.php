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


Auth::routes();

Route::namespace('Guest')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/poco/shop/', 'ShopController@index')->name('shop');
    Route::get('/poco/shopping/', 'ShoppingController@show')->name('shopping');
    Route::get('/poco/checkout/', 'CheckoutController@show')->name('checkout');
    Route::get('/poco/product/{slug}', 'ProductController@show')->name('product');
});
