<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'alumnos';

    // relacion muchos a muchos (alumnos -> clases)
    public function clases()
    {
        return $this->belongsToMany('cursos\Clase', 'rel_alumno_clases', 'alumnos_id', 'clases_id');
    }

}
