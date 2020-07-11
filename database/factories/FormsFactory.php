<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forms;
use Faker\Generator as Faker;

$factory->define(Forms::class, function (Faker $faker) {
    return [
        'name' => 'FORM-'.$faker->numberBetween(1,50),
        'code' => $faker->stateAbbr,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
        'types_forms_id' => $faker->numberBetween(1, 5),
    ];
});