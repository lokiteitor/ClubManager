<?php

use Faker\Generator as Faker;

$factory->define(App\Clase::class, function (Faker $faker) {
    $horaFin = $faker->time();
    $horaInicio = $faker->time($max=$horaFin);
    return [
        //
        'hora_inicio' => $horaInicio,
        'hora_fin' => $horaFin,
        'dia_semana' => $faker->randomElement(['L','M','Mi','J','V','S','D'])
    ];
});
