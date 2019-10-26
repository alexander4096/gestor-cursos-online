<?php

namespace cursos\Http\Controllers;

use cursos\Cursos;
use cursos\Galeriafotos;
use cursos\Curso_users; // tabla pivote

use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // carga lista de objetos de fotos destacadas para carrusel
        $galeriafotos = Galeriafotos::all()->where('checkgaleria',1);
        // se llama al modelo para que cargue todo los registro (objetos)
        // en la variable $cursos
        $cursos= Cursos::all();
        // se retorna la vista y se envia el arreglo del contenido de:
        // $cursos y $galeriafotos
        return view('cursos.index')->with(compact('cursos','galeriafotos'));
    }

    // metodo para poblar la pagina de listado-cursos.blade.php
    public function listadocursos()
    {
        // carga la lista por paginacion de 6 items
        $cursos= Cursos::paginate(6);
        // envia el contenido de la variable a la vista listado-cursos
        return view('cursos.listado-cursos')->with(compact('cursos'));
    }

     // metodo para poblar la pagina de detalle-curso.blade.php
     public function detallecurso($id)
     {
         // carga los comentarios sobre el id del curso
         $comentarios = Cursos::find($id)->comentarios;
         // carga la lista de items cursos
         $curso= Cursos::find($id);
         // envia el contenido de la variable a la vista
         return view('cursos.detalle-cursos')->with(compact('curso','comentarios'));
     }

    public function create()
    {
        //
    }

    // registrar un curso para el alumnno
    public function store(Request $request)
    {
        // Guardar Objeto
        $Curso_users = new Curso_users(); // Crea objeto
        // carga los valore de los campos 
        $Curso_users->id_curso = $request->input('id_curso');
        $Curso_users->id_user = $request->input('id_user');
        $Curso_users->save(); // guarda el registro
        return back();
    }

    public function show(Cursos $cursos)
    {
        //
    }

    public function edit(Cursos $cursos)
    {
        //
    }

    public function update(Request $request, Cursos $cursos)
    {
        //
    }

    public function destroy(Cursos $cursos)
    {
        //
    }
}
