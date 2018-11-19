<?php

use Faker\Generator as Faker;

$factory->define(App\Cuenta::class, function (Faker $faker) {
    // definir una fecha inicial
    $fin = $faker->dateTimeThisYear();
    // a la fecha anterior restarle un mes
    $inicio = $faker->dateTimeThisYear($fin);    
    return [
        //
        'fecha_inicio' => $inicio,
        'fecha_fin' => $fin,
        'estado' => $faker->boolean(90),
        'subtotal' => $faker->randomFloat(2,1200,11000)
    ];
});
