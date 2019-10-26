<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Cursos; // llama al modelo Cursos

class FormBaseController extends Controller
{

    public function index()
    {
        $cursos=Cursos::paginate(5);
        return view('form-index')->with(compact('cursos'));
    }

    public function create()
    {
        return view('form-create');
    }

    public function store(Request $request)
    {
        // Guardar Objeto
        $cursos = new Cursos(); // Crea objeto
        // carga los valore de los campos 
        $cursos->titulo = $request->input('titulo');
        $cursos->descripcion = $request->input('descripcion');
            // capturar destacado y convertirlo en valor 1 y 0
            if($request->input('destacado')!=null){
                $destacado=1;
            }else{
                $destacado=0;
            }
        $cursos->destacado = $destacado;
        $cursos->save(); // guarda el registro

        // redireccion con parametro pone titulo del ultimo item grabado
        $titulo = 'grabado:'. $request->input('titulo');
        return redirect('form-basico/create')->with('report', $titulo);
    }

    public function show($id)
    {
         // ubicar el producto editado
         $curso = Cursos::find($id);
         return view('form-show')->with(compact('curso'));
    }

    public function edit($id)
    {
        $curso = Cursos::find($id);
        return view('form-edit')->with(compact('curso'));
    }

    public function update(Request $request, $id)
    {
        // ubicar el producto editado
         $cursos = Cursos::find($id);
         // actualiza valores de los campos 
         $cursos->titulo = $request->input('titulo');
         $cursos->descripcion = $request->input('descripcion');
             // capturar destacado y convertirlo en valor 1 y 0
             if($request->input('destacado')!=null){
                 $destacado=1;
             }else{
                 $destacado=0;
             }
         $cursos->destacado = $destacado;
         $cursos->save(); // guarda el registro

        // redireccion con parametro pone titulo del ultimo item grabado
        $titulo = 'Curso Editado';
        return redirect('form-basico/' . $id . '/edit')->with('report', $titulo);
    }

    public function destroy($id)
    {
        // ubicar el producto editado
        $cursos = Cursos::find($id);
        $cursos->delete(); // Borra el registro
        // redireccion con parametro pone titulo del ultimo item grabado
        $titulo = 'ID de Curso ['. $id .'] Borrado : TL ='. $cursos::all()->count();
        return back()->with('report', $titulo);
    }
}
