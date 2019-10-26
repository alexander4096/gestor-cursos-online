<?php

use Faker\Generator as Faker;

$factory->define(cursos\Diploma::class, function (Faker $faker) {
    return [
        // faker de Diploma
        // imagen descargada en /public/diploma (guarda sin ruta)
        'url_diploma' => $faker->image('public/diploma/',640,480,'technics',false),
        
    ];
});
