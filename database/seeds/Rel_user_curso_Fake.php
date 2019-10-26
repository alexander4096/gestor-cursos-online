<?php

use Illuminate\Database\Seeder;
use cursos\User;           // para llamar al modelo User
use cursos\Cursos;         // para llamar al modelo Cursos
use cursos\Curso_users;    // para llamar al modelo Curso_users


class Rel_user_curso_Fake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido
        Curso_users::query()->delete();

        // obtener todos los cursos 
        $cursos = Cursos::all();

        // relacion muchos a muchos (tabla pivote)
        User::all()->each(function ($user) use ($cursos) { 
            $user->cursos()->attach(
                $cursos->random(rand(1, 3))->pluck('id')->toArray()
            );     
        });    

    }
}
