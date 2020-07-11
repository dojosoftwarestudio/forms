<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Groups;
use Faker\Generator as Faker;

$factory->define(Groups::class, function (Faker $faker) {
    return [
        'name' => 'GROUP-'.$faker->numberBetween(1,10),
        'description' =>  $faker->text(100),
        'code' => $faker->stateAbbr,
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
