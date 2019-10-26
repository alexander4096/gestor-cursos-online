<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Galeriafotos extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'galeriafotos';

    // relacion inversa  ente galeria de Fotos y cursos
    public function cursos()
    {
        return $this->belongsTo('cursos\Cursos','id_cursos','id');
    }

}
