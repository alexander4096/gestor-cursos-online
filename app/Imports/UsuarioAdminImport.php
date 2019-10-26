<?php

namespace cursos\Imports;

use cursos\User_admin;
use Maatwebsite\Excel\Concerns\ToModel;

class UsuarioAdminImport implements ToModel
{
    public function model(array $row)
    {
        return new User_admin([
            'name'     => $row[0],
            'email'    => $row[1], 
            'password' => $row[2],
        ]);
    }
}
