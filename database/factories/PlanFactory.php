<?php

use Faker\Generator as Faker;

$factory->define(App\Plan::class, function (Faker $faker) {
    return [
        'name' => 'Plano '.rand(1,3),
        'amount' => $faker->randomFloat(2, 887, 888),
        'description' => $faker->name,
    ];
});
