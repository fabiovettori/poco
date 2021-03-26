<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\Order;

class Customer extends Model
{
    public function reviews()
   {
       return $this->hasMany('App\Review');
   }

   public function orders()
  {
      return $this->hasMany('App\Order');
  }
}
