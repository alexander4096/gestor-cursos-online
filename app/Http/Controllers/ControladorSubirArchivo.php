<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;

class ControladorSubirArchivo extends Controller
{
    // mostrar vista para subir
    public function vista() {

        // lectura de contenido Directorio
        $uploadfiles = [];
        $filesInFolder = \File::files('upload');
        foreach($filesInFolder as $path)
        {
            $uploadfiles[] = pathinfo($path);
        } 
    
        // mostrar vista
        return view('vista')->with('uploadfiles', $uploadfiles);
    }

    // almacenar archivo subido a ruta /upload
    public function subir(Request $request) 
    {
        $file = $request->file('file');
        $ruta = public_path() . '/upload';
        $filaName = uniqid() . $file->getClientOriginalName();
        $file->move($ruta, $filaName);

        $request->session()->flash('notificacion', 'Se ha subido el archivo:'. $filaName);

        return back();
    }


}
