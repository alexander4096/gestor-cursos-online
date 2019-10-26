<?php

use Illuminate\Database\Seeder;
use cursos\Rel_alumno_clase;  // para llamar al modelo

class rel_alumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // relacion muchos a muchos alumno -> clase
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '1',
                    'clases_id' =>  '1'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '1',
                    'clases_id' =>  '2'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '1',
                    'clases_id' =>  '3'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '1',
                    'clases_id' =>  '4'
                ]);
                // relacion muchos a muchos clase -> alumno *inverso
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '2',
                    'clases_id' =>  '1'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '3',
                    'clases_id' =>  '1'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '4',
                    'clases_id' =>  '1'
                ]);
                Rel_alumno_clase::create([
                    'alumnos_id' =>  '5',
                    'clases_id' =>  '1'
                ]);
        
    }
}
