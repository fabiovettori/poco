<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Config;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < count(Product::all()); $i++) {
            $new_config = new Config();
            $product_id = Product::all()->pluck('id')->random();
            $product_check = Config::where('product_id', $product_id)->first();
            while ($product_check) {
                $product_id = Product::all()->pluck('id')->random();
                $product_check = Config::where('product_id', $product_id)->first();
            }
            $new_config->product_id = $product_id;
            $new_config->price = $faker->randomFloat(1, 2, 20);
            $new_config->size = $faker->randomElement(['L', 'M', 'S', 'X']);
            $new_config->sku = $faker->shuffle('ABCDEF123456789');
            $new_config->discount = $faker->numberBetween(0, 20);
            $new_config->visibility = collect([1, 1, 1, 0])->random();
            $new_config->save();
        }
    }
}
