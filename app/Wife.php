<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
    public function myhusband()
    {
        // inverso relacion uno uno
         return $this->belongsTo('cursos\Husband','husband_id');
    }

}
