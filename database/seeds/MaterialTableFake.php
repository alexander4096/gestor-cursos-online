<?php

use Illuminate\Database\Seeder;
use cursos\Cursos;      // para llamar al modelo Cursos
use cursos\Material;    // para llamar al modelo Material

class MaterialTableFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido
        Material::query()->delete();

        // relacion uno a muchos
        // lee toda la tabla de cursos desde la Clase 
        // agrega 4  fotos como Material correspondiente 

        Cursos::all()->each(function ($cursos) {
            // Genera 4 fotos Objetos para Material  
            $material = factory(Material::class, 4)->make();
            // grabar las fotos en su metodo en grupos
            $cursos->material()->saveMany($material);
        });
    }
}
