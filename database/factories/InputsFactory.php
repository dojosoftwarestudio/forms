<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inputs;
use Faker\Generator as Faker;

$factory->define(Inputs::class, function (Faker $faker) {
    $name = 'INPUT-' . $faker->numberBetween(1, 30);
    return [
        'name' => $name,
        'description' => $faker->text(100),
        'code' =>  $faker->stateAbbr,
        'label' => $name,
        'required' => $faker->numberBetween(0, 1),
        'is_table' => $faker->numberBetween(0, 1),
        'types_inputs_id' => $faker->numberBetween(1, 5),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' =>  0,
        'user_mod' => 'factory',
    ];
});
