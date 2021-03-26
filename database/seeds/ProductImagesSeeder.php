<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\ProductImage;
use App\Product;

class ProductImagesSeeder extends Seeder
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
            $product_check = ProductImage::where('product_id', $product_id)->first();
            while ($product_check) {
                $product_id = Product::all()->pluck('id')->random();
                $product_check = ProductImage::where('product_id', $product_id)->first();
            };
            $category_name = Product::find($product_id)->category->name;
            $category = 'products.' . $category_name;
            $category = preg_replace('/\s+/', '', $category);
            $category_images = config($category);
            $product_images = $category_images[rand(0, count($category_images) - 1)];

            for ($j=0; $j < count($product_images); $j++) {
                $new_image = new ProductImage();
                $new_image->product_id = $product_id;
                $new_image->image = $product_images[$j];
                $new_image->save();
            }
        }
    }
}
