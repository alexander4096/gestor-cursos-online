<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'clases';

    // relacion muchos a muchos (alumnos -> clases)
    public function alumnos()
    {
        return $this->belongsToMany('cursos\Alumno', 'rel_alumno_clases', 'clases_id', 'alumnos_id' );
    }


}
