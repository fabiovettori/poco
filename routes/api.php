<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function(){
    // Home
    Route::get('/categories', 'CategoriesController@show');
    Route::get('/products', 'ProductsController@show');
    Route::get('/products/all', 'PureProductsController@show');
    Route::get('/testimonials', 'TestimonialsController@show');

    // Product
    Route::get('/poco/product', 'ProductController@show');
});
