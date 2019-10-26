<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Cursos;

class AjaxEditarController extends Controller
{
    // Editar CURSO
    public function editar($id)
    {
        $curso= Cursos::find($id);
        return view('AjaxEditar')->with(compact('curso'));
    }

     // UPDATE CURSO
     public function update(Request $request, $id)
     {
         // si ha llamado por ajax
         if ($request->ajax()) {
            $curso = Cursos::find($id);
            $curso->titulo = $request->input('titulo');
            $curso->descripcion = $request->input('descripcion');
            if($request->input('destacado')!=null){
                $destacado=1;
            }else{
                $destacado=0;
            }
            $curso->destacado = $destacado;
            $curso->detalle = $request->input('detalle');
            $curso->save(); // guarda el registro
            // respuesta enviada por JSON
            return response()->json([
                'update' => $curso->updated_at,
                'mensaje' => 'Registro editado'
            ]);
         }
       
     }

}
