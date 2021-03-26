<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = config('categories');

        for ($i=0; $i < count($categories); $i++) {
            $new_category = new Category();
            $new_category->name = $categories[$i]['name'];
            $new_category->slug = Str::slug($new_category->name, '-');
            $new_category->cover = $categories[$i]['cover'];
            $new_category->save();
        }
    }
}
