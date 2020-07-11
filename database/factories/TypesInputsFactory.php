<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TypesInputs;
use Faker\Generator as Faker;

$factory->define(TypesInputs::class, function (Faker $faker) {
    $name = 'TI-' . $faker->numberBetween(1, 5);
    return [
        'name' => $name,
        'label' => $name,
        'code' =>  $faker->stateAbbr,
        'default_values' => $faker->text(100),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' =>  0,
        'user_mod' => 'factory',
    ];
});
