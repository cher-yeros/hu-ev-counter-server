<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tesebaki;
use App\Sebaki;
use Faker\Generator as Faker;

$factory->define(Tesebaki::class, function (Faker $faker) {
    $type = $faker->randomElement(['yetekebele','yetemelese','tesfa_yesete']);
    $gender = $faker->randomElement(['male','female']);
    return [
        'sebaki_id' => function() {
            return factory(Sebaki::class)->create()->id;
        },
        'campus_id' => $faker->randomElement(['1']),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'type' => $type,
        'gender' => $gender,
    ];
});

class Tester {
    static $i = 0;


    static function getI() {
        if($i==3)$i--;
        if($i==0)$i++;
        return $i;
    }
}
