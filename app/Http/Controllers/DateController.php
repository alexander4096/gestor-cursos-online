<?php

namespace cursos\Http\Controllers;

use cursos\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    // indice
    public function index()
    {
        $dates= Date::paginate(5);
        return view('indexDate')->with(compact('dates'));  
    }

    // crear
    public function create()
    {
        return view('CreateDate');
    }

    // store POST
    public function store(Request $request)
    {
        // Guardar Objeto
        $date = new Date(); // Crea objeto
        // carga los valore de los campos 
        $date->nombre = $request->input('nombre');
        $date->edad = $request->input('edad');
        $date->email = $request->input('email');      
        $date->save(); // guarda el registro
        // redireccion 
        $request->session()->flash('report', 'Se ha registrado: '. $date->nombre);
        return back();
    }

    // show GET
    public function show($id)
    {
        // ubicar date
        $date = Date::find($id);
        return view('ShowDate')->with(compact('date'));
    }

    public function edit($id)
    {
        $date = Date::find($id);
        return view('EditDate')->with(compact('date'));
    }

    public function update(Request $request, $id)
    {
        // ubicar date
         $date = Date::find($id);
         // actualiza valores de los campos 
         $date->nombre = $request->input('nombre');
         $date->edad = $request->input('edad');
         $date->email = $request->input('email');      
         $date->save(); // guarda el registro
            
        // redireccion 
        $request->session()->flash('report', 'Se ha EDITADO: '. $date->nombre);
        return back();
    }
    
    // destroy
    public function destroy($id, Request $request)
    {
        $date = Date::find($id);
        $nombre = $date->nombre;
        $date->delete(); // Borra el registro       
         // redireccion 
         $request->session()->flash('report', 'Se ha Borrado: '. $nombre);
         return back();
    }
}
