<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Cursos;

class AjaxCrearController extends Controller
{
    // Mostrar Formulario CURSO
    public function create()
    {
        return view('AjaxCrear');
    }

    // registrar Nuevo CURSO
    public function store(Request $request)
    {
        // se agrega el ajax
        if ($request->ajax()) {

              // Guardar Objeto
              $curso = new Cursos(); // Crea objeto
              $curso->titulo = $request->input('titulo');
              $curso->descripcion = is_null($request->input('descripcion'))? '' : $request->input('descripcion');
                  // capturar destacado y convertirlo en valor 1 y 0
                  if($request->input('destacado')!=null){
                      $destacado=1;
                  }else{
                      $destacado=0;
                  }
              $curso->destacado = $destacado;
              $curso->detalle = $request->input('detalle');
              $curso->save(); // guarda el registro

            // retorno de datos via json
            return response()->json(
                $curso->toArray()
            );

        }
        // fin ajax
    }

}
