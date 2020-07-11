<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UsersRoles;
use Faker\Generator as Faker;

$factory->define(UsersRoles::class, function (Faker $faker) {
    return [
        'roles_id' => $faker->numberBetween(1, 4),
        'users_id' => $faker->numberBetween(1, 5),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
