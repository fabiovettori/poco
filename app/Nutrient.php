<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Nutrient extends Model
{
    public function product(){
        return $this->belongsTo('App\Product', 'products', 'product_id');
    }
}
