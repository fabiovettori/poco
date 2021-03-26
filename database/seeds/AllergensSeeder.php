<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Allergen;

class AllergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         $allergens = ['cereals', 'shellfishes', 'eggs', 'fish', 'peanuts', 'soy', 'milk', 'nuts', 'celery', 'mustard', 'sesame', 'sulphites', 'lupins', 'clums'];

         for ($i=0; $i < count($allergens); $i++) {
             $new_allergen = new Allergen();
             $new_allergen->name = $allergens[$i];
             $new_allergen->save();
         }
     }
}
