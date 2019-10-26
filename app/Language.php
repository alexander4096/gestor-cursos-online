<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function profesor()
    {
        // inverso relacion uno a muchos
        return $this->belongsTo('cursos\Teacher','teacher_id');
    }

}
