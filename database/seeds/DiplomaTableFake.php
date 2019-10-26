<?php

use Illuminate\Database\Seeder;
use cursos\Cursos;      // para llamar al modelo Cursos
use cursos\Diploma;     // para llamar al modelo Diploma

class DiplomaTableFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido
        Diploma::query()->delete();

        // relacion 1 a 1 con poblado de faker
        Cursos::all()->each(function ($cursos) {
            // generar el diploma
            $diploma = factory(Diploma::class)->make();
            // guarda un solo elemento
            $cursos->diploma()->save($diploma);    
        });
        
    }
}
