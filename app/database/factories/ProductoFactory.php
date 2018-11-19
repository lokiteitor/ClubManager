<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'precio' => $faker->randomFloat(2),
        'costo' => $faker->randomFloat(2)
    ];
});
