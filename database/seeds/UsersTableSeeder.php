<?php

use Illuminate\Database\Seeder;
use cursos\User;  // para llamar a la clase

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'       =>  'cliente',
            'email'      =>  'alexander1973r@gmail.com',
            'password'   =>   bcrypt('123')
        ]);   

    }
}
