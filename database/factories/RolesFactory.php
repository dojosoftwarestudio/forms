<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Roles;
use Faker\Generator as Faker;

$factory->define(Roles::class, function (Faker $faker) {
    $name = 'ROL-' . $faker->text(5);
    return [
        'name' => $name,
        'description' => $faker->text(100),
        'code' =>  $faker->stateAbbr,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' =>  0,
        'user_mod' => 'factory',
    ];
});
