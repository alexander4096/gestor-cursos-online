<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Material;

class MaterialAdminController extends Controller
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
        return view('cursos.area-admin.cursos.material-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardar Objeto
        $material = new Material(); // Crea objeto
        // carga los valore de los campos 
        $material->titulo = $request->input('titulo');
        $material->descripcion = is_null($request->input('descripcion'))? '' : $request->input('descripcion');
        $material->id_curso = $request->input('id_curso');
        // para la imagen / video 
        $file = $request->file('file');
        $ruta = public_path() . '/material';
        $filaName = uniqid() . $file->getClientOriginalName();
        $file->move($ruta, $filaName);
        $material->url_material = $filaName;
        $material->save(); // guarda el registro

        // redireccion
        $request->session()->flash('notificacion', 'registrado Material');
        return redirect()->route('admin-Material.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('cursos.area-admin.cursos.material-show')->with(compact('material'));
    }

    // editar Material
    public function edit($id)
    {
        $material = Material::find($id);
        return view('cursos.area-admin.cursos.material-edit')->with(compact('material'));
    }

    // actualizar Material
    public function update(Request $request, $id)
    {
        $material = Material::find($id);
         // carga los valores a los campos 
         $material->titulo = $request->input('titulo');
         $material->descripcion = is_null($request->input('descripcion'))? '' : $request->input('descripcion');
         $material->id_curso = $request->input('id_curso');

        // PARA imagen/ video verificar si ha cambiado la imagen de subida
        $file = $request->file('file');
        if (is_null($file)) {
          // ES NULO
        } else
        {
          // NO ES NULO
          // ACTUALIZA la imagen / video 
          $file = $request->file('file');
          $ruta = public_path() . '/material';
          $filaName = uniqid() . $file->getClientOriginalName();
          $file->move($ruta, $filaName);
          $material->url_material = $filaName;
        }
         
        $material->save(); // guarda el registro
  
        // redireccion
        $request->session()->flash('notificacion', 'Material EDITADO');
        return back()->with(compact('material'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id); // busca el material
        $material->delete(); // Borra el registro       
        // back
        return back(); 
    }
}
