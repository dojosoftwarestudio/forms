<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permissions;
use Faker\Generator as Faker;

$factory->define(Permissions::class, function (Faker $faker) {
    $name = 'PERMISSION-' . $faker->text(5);
    return [
        'name' => $name,
        'description' => $faker->text(100),
        'code' =>  $faker->stateAbbr,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' =>  0,
        'user_mod' => 'factory',
    ];
});
