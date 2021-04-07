<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use FakerRestaurant\Restaurant;
use Illuminate\Support\Str;
use App\Ingredient;
use App\Category;
use App\Product;
use App\Tag;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        for ($i=0; $i < 20; $i++) {
            $new_product = new Product();
            $new_product->name = $faker->foodName();
            $new_product->category_id = Category::all()->pluck('id')->random();

            $slug = Str::slug($new_product->name, '-');
            $slug_base = $slug;
            $counter = 1;
            $slug_check = Product::where('slug', $slug)->first();
            while ($slug_check) {
                $slug = $slug_base . '-' . $counter;
                $slug_check = Product::where('slug', $slug)->first();
                $counter++;
            }
            $new_product->slug = $slug;

            $new_product->short_description = $faker->text(90);
            $new_product->long_description = $faker->text(500);
            $new_product->save();

            $ingredients = Ingredient::all()->pluck('id')->random(rand(5, 10));
            $new_product->ingredients()->attach($ingredients);

            $tags = Tag::all()->pluck('id')->random(rand(1, 3));
            $new_product->tags()->attach($tags);
        }
    }
}
