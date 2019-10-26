<?php

use Faker\Generator as Faker;

$factory->define(cursos\Material::class, function (Faker $faker) {
    return [
        // faker de material
        // imagen de URL 
        'url_material' => $faker->imageUrl(400,300,'business'),
        // Genera una oración aleatoria
        'titulo'=> 'Material de: ' . $faker->sentence(4, true),
       // genera la descripcion aleatoria
       'descripcion' => $faker->text(200),
    ];
});
