<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Database\Eloquent\Builder;

class TestimonialsController extends Controller
{
    public function show(){
        $testimonials = Customer::whereHas('reviews', function(Builder $query){
            $query->where('score', '>=', 4);
        })->with(['reviews' => function($query){
            $query->where('score', '>=', 4);
        }])->get();

        return response()->json([
            'success' => true,
            'testimonials' => $testimonials
        ]);
    }
}
