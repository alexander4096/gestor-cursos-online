<?php

use Illuminate\Database\Seeder;
use cursos\Cursos;  // para llamar al modelo Cursos
use cursos\Galeriafotos;  // para llamar al modelo Galeriafotos


class GaleriafotosTableFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido
        Galeriafotos::query()->delete();

        // relacion uno a muchos
        // lee toda la tabla de cursos desde la Clase 
        // agrega entre 1 a 5 fotos para cada curso correspondiente 

        Cursos::all()->each(function ($cursos) {
            // obtiene un rand(1,5) 1 a 5 fotos Objetos  
            $galeriafotos = factory(Galeriafotos::class, rand(1,5))->make();
            // grabar las fotos en su metodo en grupos
            $cursos->galeriafotos()->saveMany($galeriafotos);
        });

    }
}
