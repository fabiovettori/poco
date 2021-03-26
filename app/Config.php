<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Config extends Model
{
    public function products()
   {
       return $this->belongsTo('App\Product', 'products', 'product_id');
   }
}
