<?php

use Illuminate\Database\Seeder;
use cursos\Alumno;  // para llamar al modelo

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // se usa un for para crear 9 registros de nombres de alumno
        for ($i=0; $i<10; $i++){
            Alumno::create([
                'name'      =>  'Alumno #' . $i
            ]);
        }

    }
}
