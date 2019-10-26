<?php

use Illuminate\Database\Seeder;
use cursos\Language;  // para llamar al modelo

class languagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Language::create([
            'name'        =>  'Ingles',
            'teacher_id' =>  '1'
        ]);  
        // 2
        Language::create([
            'name'        =>  'Español',
            'teacher_id' =>  '1'
        ]);  
        // 3
        Language::create([
            'name'        =>  'Aleman',
            'teacher_id' =>  '1'
        ]); 
        // 4 
        Language::create([
            'name'        =>  'Ingles',
            'teacher_id' =>  '2'
        ]);  

    }
}
