<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailOrder;
use App\Payment;
use App\Customer;

class Order extends Model
{
    public function detail()
   {
       return $this->hasOne('App\DetailOrder', 'details_order');
   }

   public function customer()
  {
      return $this->belongsTo('App\Customer');
  }

  public function payment()
 {
     return $this->hasOne('App\Payment');
 }
}
