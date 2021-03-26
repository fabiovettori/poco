<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Customer;
use App\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 200; $i++) {
            $new_order = new Order;
            $customer_id = Customer::all()->pluck('id')->random();
            $new_order->customer_id = $customer_id;
            $new_order->code = $faker->shuffle('ABCDEF123456789');
            $new_order->vat = 22;
            $new_order->note = $faker->text(rand(15, 150));
            $new_order->save();
        }
    }
}
