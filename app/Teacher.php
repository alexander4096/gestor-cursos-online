<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // relacion uno a muchos
    public function idiomas()
    {
        return $this->hasMany('cursos\Language', 'teacher_id','id');
    }

}
