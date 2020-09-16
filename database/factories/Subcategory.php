<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'subcategory_name' => $faker->word,
        'subcategory_image' => '1600094558.png',
        'category_id' => factory(App\Category::class),
    ];
});
