<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function show(){

        $categories = Category::all();

        return response()->json([
            'success' => 'true',
            'categories' => $categories,
        ]);
    }
}
