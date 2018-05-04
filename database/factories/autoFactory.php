<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'fecha_llegada' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'chasis' => $faker->isbn13,
        'tipo_auto' => $faker->firstNameMale,
        'ultimo_servicio' => $faker->monthName($max = 'now'),
        'fecha_ultimo_servicio' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
