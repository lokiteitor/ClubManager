<?php

use Faker\Generator as Faker;

$factory->define(App\RegistroConsumo::class, function (Faker $faker) {
    return [
        //
        'cantidad' => $faker->numberBetween(1,8)
    ];
});
