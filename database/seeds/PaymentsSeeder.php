<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Payment;
use App\Order;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < count(Order::all()); $i++) {
            $new_payment = new Payment();
            $order_id = Order::all()->pluck('id')->random();
            $order_check = Payment::where('order_id', $order_id)->first();
            while ($order_check) {
                $order_id = Order::all()->pluck('id')->random();
                $order_check = Payment::where('order_id', $order_id)->first();
            }
            $new_payment->order_id = $order_id;
            $new_payment->gateway = $faker->randomElement(['Stripe', 'Paypal', 'Braintree', 'Credit Card']);
            $new_payment->status = $faker->randomElement(['accepted', 'pending', 'rejected']);
            $new_payment->save();
        }
    }
}
