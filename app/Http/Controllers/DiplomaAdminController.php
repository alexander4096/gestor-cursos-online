<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Diploma;

class DiplomaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.area-admin.cursos.diploma-create');
    }

    // registrar diploma
    public function store(Request $request)
    {
         // hace una consulta para confirma que ya exite el diploma
         $id_curso = $request->input('id_curso');
         // retorna una collection
         $Diploma = Diploma::all()->where('id_curso',$id_curso);
         
        // UPLOAD IMG para la imagen
        if (!is_null($request->file('file'))) {
            $file = $request->file('file');
            $ruta = public_path() . '/diploma';
            $filaName = uniqid() . $file->getClientOriginalName();
            $file->move($ruta, $filaName);
        } else {
            $filaName='';
        }
       
        // condicion de si existe el diploma el id_curso tambien existe
        if(isset($Diploma->first()->id_curso)) {
            // si existe el diploma se modifica 
                // se usa first() para que retorne un objeto en lugar de una collection
                $Diploma = Diploma::all()->where('id_curso',$id_curso)->first();
                $Diploma->url_diploma = $filaName;
                $notificacion ='EDITADO UN DIPLOMA';
        }else{
            // NO existe el diploma se crea
                // Guardar Objeto
                $Diploma = new Diploma(); // Crea objeto
                // carga los valore de los campos 
                $Diploma->id_curso = $request->input('id_curso');
                $Diploma->url_diploma = $filaName;
                $notificacion ='CREADO UN DIPLOMA';          
        }

            $Diploma->save(); // guarda el registro   

            // redireccion
            $request->session()->flash('notificacion',  $notificacion);
            return redirect()->route('admin-diploma.create');
    
    }


    public function show($id)
    {
        //
    }

    // mostrar edicion
    public function edit($id)
    {
        $Diploma = Diploma::find($id);
        return view('cursos.area-admin.cursos.diploma-edit')->with(compact('Diploma'));
    }

    // Actualizar DIPLOMA
    public function update(Request $request, $id)
    {
       $Diploma = Diploma::find($id);
       // PARA imagen/ video verificar si ha cambiado la imagen de subida
       $file = $request->file('file');
       if (is_null($file)) {
         // ES NULO
       } else
       {
         // NO ES NULO
         // ACTUALIZA la imagen / video 
         $file = $request->file('file');
         $ruta = public_path() . '/diploma';
         $filaName = uniqid() . $file->getClientOriginalName();
         $file->move($ruta, $filaName);
         $Diploma->url_diploma = $filaName;
       }

       $Diploma->save(); // guarda el registro
    
       // redireccion
       $request->session()->flash('notificacion', 'Diploma EDITADO');
       return back()->with(compact('Diploma'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Diploma = Diploma::find($id); // buscar foto en galeria
        $Diploma->delete(); // Borra el registro       
        // back
        return back(); 
    }
}
