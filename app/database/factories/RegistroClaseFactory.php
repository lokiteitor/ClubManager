<?php

use Faker\Generator as Faker;

$factory->define(App\RegistroClase::class, function (Faker $faker) {
    return [
        //
        'estado' => $faker->boolean(90)
    ];
});
