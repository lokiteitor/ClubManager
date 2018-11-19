<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        //
        'email' => $faker->unique()->safeEmail,
        'nombre' => $faker->firstName(),
        'ap_paterno' => $faker->lastName,
        'ap_materno' => $faker->lastName,
        'direccion' => $faker->address,
        'password' => $faker->password,
        'telefono' => $faker->e164PhoneNumber,
        'empleado' => $faker->randomElement(
            ['empleado','administrador','cliente'])
    ];
});
