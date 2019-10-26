<?php

use Faker\Generator as Faker;

$factory->define(cursos\Comentarios::class, function (Faker $faker) {
    return [
        // Genera un parrafo
        'comentario'=> $faker->paragraph(5,true),
    ];
});
