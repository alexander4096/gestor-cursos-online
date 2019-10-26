<?php

use Illuminate\Database\Seeder;
use cursos\Teacher;  // para llamar al modelo

class teachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Teacher::create([
            'name'        =>  'Dr. Alexander'
        ]);  
        // 2
        Teacher::create([
            'name'        =>  'Prof. David'
        ]);  
        // 3
        Teacher::create([
            'name'        =>  'Ing. Ricardo'
        ]);  

    }
}
