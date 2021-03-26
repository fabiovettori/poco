<?php

use Illuminate\Database\Seeder;
use App\DetailOrder;
use App\Product;
use App\Order;

class DetailsOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < count(Order::all()); $i++) {

            for ($j=0; $j < 5; $j++) {
                $new_oder = new DetailOrder;
                $new_oder->order_id = $i + 1;
                $new_oder->quantity = rand(1, 5);
                $new_oder->save();

                $products = Product::all()->pluck('id')->random(rand(1, 3));
                $new_oder->products()->attach($products);
            }
        }
    }
}
