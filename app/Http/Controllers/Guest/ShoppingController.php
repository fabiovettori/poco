<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function show(){
        return view('guest.shopping');
    }
}
