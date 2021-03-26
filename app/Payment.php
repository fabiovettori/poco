<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Payment extends Model
{
    public function order()
   {
       return $this->belongsTo('App\Order');
   }
}
