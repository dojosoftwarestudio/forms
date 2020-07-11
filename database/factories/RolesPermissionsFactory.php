<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RolesPermissions;
use Faker\Generator as Faker;

$factory->define(RolesPermissions::class, function (Faker $faker) {
    return [
        'roles_id' => $faker->numberBetween(1, 4),
        'permissions_id' => $faker->numberBetween(1, 10),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
