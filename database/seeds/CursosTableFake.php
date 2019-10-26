<?php

use Illuminate\Database\Seeder;
use cursos\Cursos;  // para llamar al modelo 

class CursosTableFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido
        Cursos::query()->delete();

        // creamos 25 registros para Cursos
        factory(Cursos::class,25)->create();

    }
}
