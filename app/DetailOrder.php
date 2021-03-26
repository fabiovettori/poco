<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;

class DetailOrder extends Model
{
    protected $table = 'details_order';

    public function products()
   {
       return $this->belongsToMany('App\Product', 'details_order_products', 'detail_order_id', 'product_id')
       ->withTimestamps();
   }

   public function order()
  {
      return $this->belongsTo('App\Order');
  }
}
