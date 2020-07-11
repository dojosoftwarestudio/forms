<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persons;
use Faker\Generator as Faker;

$factory->define(Persons::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'last_name_mat' => $faker->lastName,
        'last_name_pat' => $faker->lastName,
        'ci' => $faker->randomDigit,
        'age' => $faker->randomDigit,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' =>  0,
        'user_mod' => 'factory',
    ];
});
