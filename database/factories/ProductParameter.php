<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductParameter;
use Faker\Generator as Faker;

$factory->define(ProductParameter::class, function (Faker $faker) {
    return [
        'parameter' => $faker->name,
    ];
});
