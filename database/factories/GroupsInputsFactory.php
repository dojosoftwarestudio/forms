<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GroupsInputs;
use Faker\Generator as Faker;

$factory->define(GroupsInputs::class, function (Faker $faker) {
    return [
        'inputs_id' => $faker->numberBetween(1, 30),
        'groups_id' => $faker->numberBetween(1, 10),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
