<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Galeriafotos; // cargar modelo

class GaleriaFotosAdminController extends Controller
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

    public function create()
    {
        return view('cursos.area-admin.cursos.fotos-create');
    }

    // almacenar formulario create
    public function store(Request $request)
    {
        // Guardar Objeto
        $Galeriafotos = new Galeriafotos(); // Crea objeto
        // carga los valore de los campos 
        $Galeriafotos->titulofotos = $request->input('titulofotos');
        $Galeriafotos->id_cursos = $request->input('id_cursos');

        // CHECKBOX capturar destacado y convertirlo en valor 1 y 0
        if($request->input('checkgaleria')!=null){
            $checkgaleria=1;
        }else{
            $checkgaleria=0;
        }
        $Galeriafotos->checkgaleria = $checkgaleria;

        // UPLOAD IMG para la imagen
        $file = $request->file('file');
        $ruta = public_path() . '/img';
        $filaName = uniqid() . $file->getClientOriginalName();
        $file->move($ruta, $filaName);
        $Galeriafotos->url_fotos = $filaName;

        $Galeriafotos->save(); // guarda el registro

        // redireccion
        $request->session()->flash('notificacion', 'Nueva FOTO');
        return redirect()->route('admin-fotos.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cursos.area-admin.cursos.fotos-show');
    }

    // edit
    public function edit($id)
    {
        $Galeriafoto = Galeriafotos::find($id); // buscar foto en galeria
        return view('cursos.area-admin.cursos.fotos-edit')->with(compact('Galeriafoto'));
    }

    // registrar update
    public function update(Request $request, $id)
    {
        $Galeriafoto = Galeriafotos::find($id); // buscar foto en galeria
        // carga los valores a los campos 
        $Galeriafoto->titulofotos = $request->input('titulofotos');
        $Galeriafoto->id_cursos = $request->input('id_curso');

       // PARA imagen/ video verificar si ha cambiado la imagen de subida
       $file = $request->file('file');
       if (is_null($file)) {
         // ES NULO
       } else
       {
         // NO ES NULO
         // ACTUALIZA la imagen / video 
         $file = $request->file('file');
         $ruta = public_path() . '/img';
         $filaName = uniqid() . $file->getClientOriginalName();
         $file->move($ruta, $filaName);
         $Galeriafoto->url_fotos  = $filaName;
       }
        
       // PARA el checkgaleria
        // capturar destacado y convertirlo en valor 1 y 0
        if($request->input('checkgaleria')!=null){
            $checkgaleria=1;
        }else{
            $checkgaleria=0;
        }
        $Galeriafoto->checkgaleria = $checkgaleria;

        $Galeriafoto->save(); // guarda el registro
    
        // redireccion
        $request->session()->flash('notificacion', 'Material EDITADO');
        return back()->with(compact('Galeriafoto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // borrar contenido de galeriaFotos
    public function destroy($id)
    {
        $Galeriafoto = Galeriafotos::find($id); // buscar foto en galeria
        $Galeriafoto->delete(); // Borra el registro       
        // back
        return back(); 
    }
}
