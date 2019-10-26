<?php

namespace cursos\Http\Controllers\ruta;

use Illuminate\Http\Request;
use cursos\Http\Controllers\Controller;

class MiRutaController extends Controller
{
    public function saludo()
    {
        return '<h1>Saludos</h1>';
    }

    public function despedida()
    {
        return '<h1>despedida</h1>';
    }
}
