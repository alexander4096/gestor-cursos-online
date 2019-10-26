<?php

use Faker\Generator as Faker;

$factory->define(cursos\Galeriafotos::class, function (Faker $faker) {
    return [
        // faker de imagen (guarda la imagen sin ruta)
        'url_fotos' => $faker->image('public/img/',400,300,null,false),
        // generan 3 palabras en modo texto
        'titulofotos'=>  $faker->words(3, true),
        // rango aleatorio entre 0 a 1
        'checkgaleria' =>  $faker->numberBetween(0,1),
        
    ];
});
