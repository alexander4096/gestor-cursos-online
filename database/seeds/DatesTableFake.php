<?php

use Illuminate\Database\Seeder;
use cursos\Date;

class DatesTableFake extends Seeder
{
    public function run()
    {
        // borra el contenido de Date
        Date::query()->delete();
        // creamos 50 registros 
        factory(Date::class,50)->create(); 
    }
}
