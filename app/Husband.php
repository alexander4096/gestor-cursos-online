<?php

namespace cursos;

use Illuminate\Database\Eloquent\Model;

class Husband extends Model
{
    //
    public function mywife()
    {
        // relacion uno a uno
        return $this->hasOne('cursos\Wife');
        
    }

}
