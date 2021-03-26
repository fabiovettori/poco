<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use FakerRestaurant\Restaurant;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $counter = 0;
        while ($counter < 20) {
            $new_tag = new Tag();
            $name = $faker->word();
            $tag_check = Tag::where('name', $name)->first();

            if ($tag_check) {
                $name = $faker->word();
                $tag_check = Tag::where('name', $name)->first();
            }
            $new_tag->name = $name;
            $new_tag->save();
            $counter++;
        }
    }
}
