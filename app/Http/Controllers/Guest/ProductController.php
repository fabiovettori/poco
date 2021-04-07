<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($slug){

        $check_product = Product::where('slug', $slug)->first();

        if ($check_product) {
            $product = Product::where('slug', $slug)->with(['configs', 'category', 'images', 'reviews.customer', 'ingredients.allergen', 'nutrient:product_id,energy_k,energy_c,fat,gluxit,sugar,protein'])->first();
            $category_id = $product->category->id;
            $related_products = Product::where('category_id',$category_id)->with(['images', 'configs'])->get();

            $product_nutrition = implode(",", config('nutrition'));

            return view('guest.product', compact('product', 'related_products', 'product_nutrition'));
        } else {
            abort(404);
        }
    }
}
