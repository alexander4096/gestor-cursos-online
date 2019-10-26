<?php

namespace cursos\Rules;

use Illuminate\Contracts\Validation\Rule;

class Mayusculas implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        //
        $evaluacion = ($value==strtoupper($value))? TRUE : FALSE;
        return $evaluacion;
    }

    public function message()
    {
        return 'Todos los caracteres deben ser Mayusculas';
    }
}
