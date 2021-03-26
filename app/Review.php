<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\product;

class Review extends Model
{
    public function customer()
   {
       return $this->belongsTo('App\Customer', 'customer_id');
   }

   public function product()
  {
      return $this->belongsTo('App\Product', 'product_id');
  }
}
