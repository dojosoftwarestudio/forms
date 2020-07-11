<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TypesForms;
use Faker\Generator as Faker;

$factory->define(TypesForms::class, function (Faker $faker) {
    return [
        'name' => 'TF-' . $faker->numberBetween(1, 5),
        'code' => $faker->stateAbbr,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
