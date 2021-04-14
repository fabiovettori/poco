<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class PureProductsController extends Controller
{
    public function show(Request $request){

        $products = Product::with(['images', 'configs'])->get();

        return response()->json([
            'success' => 'true',
            'products' => $products,
        ]);
    }
}
