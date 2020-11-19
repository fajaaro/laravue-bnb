<?php

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'link' => $faker->word,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,        
    ];
});
