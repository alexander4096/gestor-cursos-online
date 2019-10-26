<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;

class AjaxLecturaController extends Controller
{

    // paginacion con campo de busqueda
    // usa request para traer toda la informacion de la vista
    function paginacionbusqueda(Request $request)
    {
        $search = $request->get('search');
        // se llama al modelo directamente \cursos\ sin declararlo al inicio 
        $cursos= \cursos\Cursos::where('titulo','LIKE','%'. $search . '%')->paginate(5);
        $request->session()->flash('search', $search);

        // se agrega el ajax (CONTENIDO)
        if ($request->ajax()) {
            return view('resultadoAJAX', ['cursos'=>$cursos]);
        }
        
        return view('DemoAjaxLectura', ['cursos'=>$cursos,'search'=>$search]); 
    }

    // eliminar 
    public function destroy(Request $request, $id)
    {
      // se agrega el ajax (Borrado)
      if ($request->ajax()) {
        // ubicar el producto editado
        $cursos = \cursos\Cursos::find($id);
        $cursos->delete(); // Borra el registro
        $search = $request->get('search');
        // se llama al modelo directamente \cursos\ sin declararlo al inicio 
        $cursos= \cursos\Cursos::where('titulo','LIKE','%'. $search . '%')->paginate(5);
        return view('resultadoAJAX', ['cursos'=>$cursos]); 
      }
    }

}
