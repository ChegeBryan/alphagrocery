<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'subcategory_id' => factory(App\Subcategory::class),
        'store_id' => factory(App\Store::class),
        'product_parameter_id' => factory(App\ProductParameter::class),
        'product_name' => $faker->word,
        'product_description' => $faker->sentence,
        'product_price' => $faker->randomFloat(2, 50, 1000),
        'product_image' => '500.png',
        'product_quantity' => $faker->randomDigit,
    ];
});
