<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function indice($locale) {
        // pone el idioma en la aplicacion
        app()->setLocale($locale);
        
        // optiene idioma a trabajar
        $idioma = app()->getLocale();
        // almacen idioma en var de session
        session()->put('idioma', $idioma);

        return view('idioma');
     }

     public function contenido() {
        // pone valor de variable de session
        $locale = session()->get('idioma');
        app()->setLocale($locale);

        return view('idioma-contenido');
     }
}
