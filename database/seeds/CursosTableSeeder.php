<?php

use Illuminate\Database\Seeder;
use cursos\Cursos;  // para llamar a la clase

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cursos::create([
            'titulo'        =>  'HTML 5',
            'descripcion'   =>  'lalala...'
        ]);   
        
        Cursos::create([
            'titulo'        =>  'PHP 1',
            'descripcion'   =>  'prueba...'
        ]);    

    }
}
