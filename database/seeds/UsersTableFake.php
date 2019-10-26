<?php

use Illuminate\Database\Seeder;
use cursos\User;  // para llamar al modelo User

class UsersTableFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido de user
        User::query()->delete();

        // creamos 50 registros para users
        factory(User::class,50)->create(); 

    }
}
