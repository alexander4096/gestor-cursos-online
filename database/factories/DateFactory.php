<?php

use Faker\Generator as Faker;

$factory->define(cursos\Date::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'edad' => $faker->numberBetween(18,65),
        'email' => $faker->unique()->safeEmail,
    ];
});
