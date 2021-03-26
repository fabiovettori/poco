<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AllergensSeeder::class,
            IngredientsSeeder::class,
            TagsSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            NutrientsSeeder::class,
            ConfigsSeeder::class,
            ProductImagesSeeder::class,
            CustomersSeeder::class,
            ReviewsSeeder::class,
            OrdersSeeder::class,
            PaymentsSeeder::class,
            DetailsOrderSeeder::class,
        ]);
    }
}
