<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sebaki;
use Faker\Generator as Faker;

$factory->define(Sebaki::class, function (Faker $faker) {
    return [
        'campus_id' => $faker->randomElement(['1']),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'username' => $faker->username,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'approved' => false
    ];
});
