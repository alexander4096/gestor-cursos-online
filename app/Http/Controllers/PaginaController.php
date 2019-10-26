<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Cursos;
use cursos\User;

class PaginaController extends Controller
{
    //
    function paginacionbasica() 
    {
        // all() se omite cuando se usa paginate()
        // 5 es la cantidad de items a mostrar
        $cursos= Cursos::paginate(5);
        return view('paginacionbasica')->with(compact('cursos'));  
    }

    // paginacion multiple
    function paginacionmultiple()
    {
        // paginacion multiple
        $cursos= Cursos::paginate(4, ['*'], 'p1');
        $users= User::paginate(3, ['*'], 'p2');
        return view('paginacionmultiple')->with(compact('cursos','users'));
    }

    // paginacion con campo de busqueda
    // usa request para traer toda la informacion de la vista
    function paginacionbusqueda(Request $request)
    {
        $search = $request->get('search');
        $cursos= Cursos::where('titulo','LIKE','%'. $search . '%')->paginate(5);
        return view('paginacionbusqueda', ['cursos'=>$cursos,'search'=>$search]); 
    }

}
