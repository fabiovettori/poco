<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('guest.home', compact('categories'));
    }
}
