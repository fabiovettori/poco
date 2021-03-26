<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Customer;
use App\Product;
use App\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) {
            $new_review = new Review();
            $new_review->product_id = Product::all()->pluck('id')->random();
            $new_review->customer_id = Customer::all()->pluck('id')->random();
            $new_review->score = rand(1, 5);
            $new_review->description = $faker->text(rand(50, 100));
            $new_review->save();
        }
    }
}
