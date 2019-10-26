<?php

use Illuminate\Database\Seeder;
use cursos\Clase;  // para llamar al modelo

class ClasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // se usa un for para crear 3 reg para fisica
        for ($i=1; $i<4; $i++){
            Clase::create([
                'clase'         =>  'Fisica #' . $i
            ]);
        }
        // se usa un for para crear 3 reg para Quimica
        for ($i=1; $i<4; $i++){
            Clase::create([
                'clase'         =>  'Quimica #' . $i
            ]);
        }
        // se usa un for para crear 3 reg para Matemática
        for ($i=1; $i<4; $i++){
            Clase::create([
                'clase'         =>  'Matemática #' . $i
            ]);
        }

    }
}
