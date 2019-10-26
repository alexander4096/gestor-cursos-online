<?php

use Illuminate\Database\Seeder;
use cursos\User_admin;  // para llamar al metodo

class User_adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //
                User_admin::create([
                    'name'        =>  'admin',
                    'email'   =>  'alexander1973r@gmail.com',
                    'password'   =>   bcrypt('123')
                ]);   
        
    }
}
