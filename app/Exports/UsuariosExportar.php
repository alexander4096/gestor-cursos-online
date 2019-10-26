<?php

namespace cursos\Exports;

use cursos\User_admin;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuariosExportar implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User_admin::all();
    }
}
