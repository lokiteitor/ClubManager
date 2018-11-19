<?php

use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
    // definir una fecha inicial
    $fin = $faker->dateTimeThisYear();
    // a la fecha anterior restarle un mes
    $inicio = $faker->dateTimeThisYear($fin);


    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'fecha_inicio' => $inicio,
        'fecha_fin' => $fin,
        'lugar' => $faker->randomElement(
            ['Sala 1','Sala 2','Sala 3','Sala 4'])
    ];
});
