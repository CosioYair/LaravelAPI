<?php

use Faker\Generator as Faker;

$factory->define(App\Wedding::class, function (Faker $faker) {
    return [
        'husband_name' => $faker->name,
        'husband_email' => $faker->unique()->safeEmail,
        'husband_phone' => $faker->unique()->phoneNumber,
        'wife_name' => $faker->name,
        'wife_email' => $faker->unique()->safeEmail,
        'wife_phone' => $faker->unique()->phoneNumber,
        'user_id' => App\User::all()->random()->id,
    ];
});
