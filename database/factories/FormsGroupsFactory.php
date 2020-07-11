<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FormsGroups;
use Faker\Generator as Faker;

$factory->define(FormsGroups::class, function (Faker $faker) {
    return [
        'forms_id' => $faker->numberBetween(1, 5),
        'groups_id' => $faker->numberBetween(1, 10),
        'status' => $faker->numberBetween(0, 1),
        'reg_del' => 0,
        'user_mod' => 'factory',
    ];
});
