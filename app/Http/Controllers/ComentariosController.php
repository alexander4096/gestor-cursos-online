<?php

namespace cursos\Http\Controllers;

use cursos\Comentarios;
use cursos\Cursos;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::paginate(10);
        return view('cursos.area-admin.comentarios.comentarios-index')->with(compact('cursos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \cursos\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Cursos::find($id);
        $comentarios=Cursos::find($id)->comentarios()->paginate(4);
         return view('cursos.area-admin.comentarios.comentarios-show')->with(compact('comentarios','curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cursos\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cursos\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
}
