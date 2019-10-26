<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    // indica al modelo cual tabla se va manejar
    protected $table = 'cursos';

    // relacion muchos a muchos (cursos -> usuarios)
    public function usuarios()
    {
        return $this->belongsToMany('cursos\User', 'cursos_users', 'id_curso', 'id_user');
    }

    // relacion cursos -> galeriafotos
    public function galeriafotos()
    {
        return $this->hasMany('cursos\Galeriafotos', 'id_cursos','id');
    }


    // relacion uno a muchos cursos -> material
    public function material()
    {
        return $this->hasMany('cursos\Material', 'id_curso','id');
    }

    // relacion uno a uno cursos->diploma
    public function diploma()
    {
      
        return $this->hasOne('cursos\Diploma','id_curso','id');
        
    }

    // relacion muchos a muchos (cursos -> comentarios)
    // tiene extra parametro ->withPivot('comentario');
    // para leer la tabla pivote
    public function comentarios()
    {
       // orden desc por col created_at
       return $this->belongsToMany('cursos\User', 'comentarios','id_curso', 'id_user')->withPivot('comentario','created_at','updated_at')->orderBy('pivot_created_at','desc');
    }


}
