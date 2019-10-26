<?php

use Illuminate\Database\Seeder;
use cursos\Wife;  // para llamar al modelo

class WivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                  // 1
                  Wife::create([
                    'name'        =>  'Veronica',
                    'husband_id' =>  '1'
                ]);  
        
                // 2
                Wife::create([
                    'name'        =>  'Anita',
                    'husband_id' =>  '2'
                ]);  
                 // 3
                 Wife::create([
                    'name'        =>  'Susana',
                    'husband_id' =>  '3'
                ]);  
        
    }
}
