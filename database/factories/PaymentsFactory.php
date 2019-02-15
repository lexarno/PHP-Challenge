<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'card_name' => $faker->name,
        'card_number' => $faker->creditCardNumber,
        'card_expiration' => $faker->creditCardExpirationDate,
        'card_cvv' => mt_rand(100, 900),
    ];
});
