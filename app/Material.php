<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'material';

    // relacion uno a muchos cursos->material
    public function cursos()
    {
        return $this->belongsTo('cursos\Cursos','id_curso','id');
    }


}
