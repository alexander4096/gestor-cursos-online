<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'diploma';
    
    // relacion uno a uno cursos -> diploma
    public function cursos()
    {
        return $this->belongsTo('cursos\Cursos','id_curso','id');
    }


}
