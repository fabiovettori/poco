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
            $product_id = Product::all()->pluck('id')->random();
            $product_check = Config::where('product_id', $product_id)->first();

            while ($product_check) {
                $product_id = Product::all()->pluck('id')->random();
                $product_check = Config::where('product_id', $product_id)->first();
            }

            for ($j=0; $j < rand(1, 3); $j++) {
                $new_config = new Config();
                $new_config->product_id = $product_id;
                $new_config->price = $faker->randomFloat(2, 3, 20);
                $new_config->sku = $faker->shuffle('ABCDEF123456789');
                $new_config->discount = $faker->numberBetween(0, 20);
                $new_config->visibility = collect([true, true, true, true, false])->random();
                $sizes = ['S', 'M', 'L'];
                $new_config->size = $sizes[$j];
                $new_config->save();
            }
        }
    }
}
