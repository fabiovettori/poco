<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Customer;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) {
            $new_customer = new Customer();
            $new_customer->name = $faker->firstName();
            $new_customer->lastname = $faker->lastName();
            $new_customer->email = $faker->safeEmail();
            $new_customer->username = $faker->userName();
            $new_customer->password = $faker->password(8, 8);
            $new_customer->avatar = $faker->randomElement(config('avatars.images'));
            $new_customer->city = $faker->city();
            $new_customer->address = $faker->address();
            $new_customer->postcode = $faker->postcode();
            $new_customer->save();
        }
    }
}
