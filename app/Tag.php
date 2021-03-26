<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Tag extends Model
{
    public function tags()
   {
       return $this->belongsToMany('App\Product');
   }
}
