<?php

use Faker\Generator as Faker;

$factory->define(cursos\Cursos::class, function (Faker $faker) {
    return [
        //
        'titulo' => 'Curso para ' . $faker->jobTitle,
        'descripcion' => $faker->text(200),
        'destacado' => $faker->randomElement([true,false]),
        'detalle' => $faker->paragraph(5),
    ];
});
