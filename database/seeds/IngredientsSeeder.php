<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use FakerRestaurant\Restaurant;
use Illuminate\Support\Arr;
use App\Ingredient;
use App\Allergen;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

         for ($i=0; $i < 50; $i++) {
             $new_ingredient = new Ingredient();
             $allergen_id = Arr::random([null, Allergen::all()->pluck('id')->random()]);
             $new_ingredient->allergen_id = $allergen_id;
             $new_ingredient->name = $faker->dairyName();
             $new_ingredient->save();
         }
     }
}
