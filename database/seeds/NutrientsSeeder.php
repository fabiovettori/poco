<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Nutrient;
use App\Product;

class NutrientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < count(Product::all()); $i++) {
             $new_nutrient = new Nutrient();
             $product_id = Product::all()->pluck('id')->random();
             $product_check = Nutrient::where('product_id', $product_id)->first();
             while ($product_check) {
                 $product_id = Product::all()->pluck('id')->random();
                 $product_check = Nutrient::where('product_id', $product_id)->first();
             }
             $new_nutrient->product_id = $product_id;
             $new_nutrient->energy_k = $faker->numberBetween(100, 1000);
             $new_nutrient->energy_c = $new_nutrient->energy_k * 4;
             $new_nutrient->fat = $faker->numberBetween(0, 100);
             $new_nutrient->gluxit = $faker->numberBetween(0, 100);
             $new_nutrient->sugar = $faker->numberBetween(0, 100);
             $new_nutrient->protein = $faker->numberBetween(0, 100);
             $new_nutrient->save();
         }
     }
}
