<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function show(Request $request){

        $category = $request->all();

        $category_id = Category::where('name', $category)->pluck('id')->first();

        $products = Product::with(['configs', 'images', 'reviews'])->where('category_id', $category_id)->get();

        return response()->json([
            'success' => 'true',
            'category_id' => $category_id,
            'category' => $category,
            'products' => $products,
        ]);
    }
}
