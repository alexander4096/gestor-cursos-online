<?php

use Illuminate\Database\Seeder;
use cursos\User;           // para llamar al modelo User
use cursos\Cursos;         // para llamar al modelo Cursos
use cursos\Comentarios;    // para llamar al modelo Comentarios

class Rel_comentarios_Fake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // borra el contenido de Comentarios
        Comentarios::query()->delete();

        // obtener todos los cursos 
        $cursos = Cursos::all();

        // relacion muchos a muchos (tabla pivote)
        // se agrega valor al campo comentario
        User::all()->each(function ($user) use ($cursos) { 
            // generar Faker del campo comentario
            $comentarios = factory(Comentarios::class)->make();
            // generar relacion de muchos a muchos desde user para comentario
            $user->comentarios()->attach(
                $cursos->random(rand(1, 5))->pluck('id')->toArray(),  ['comentario' => $comentarios->comentario]
            );     
        });    

    }
}
