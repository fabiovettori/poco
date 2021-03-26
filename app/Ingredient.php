<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Allergen;
use App\Product;

class Ingredient extends Model
{
    public function products()
   {
       return $this->belongsToMany('App\Product');
   }

   public function allergen()
  {
      return $this->belongsTo('App\Allergen');
  }
  
}
