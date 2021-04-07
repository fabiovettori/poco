<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('guest.shop', compact('products'));
    }
}
