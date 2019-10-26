<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Cursos;
use Illuminate\Support\Facades\Validator; // validacion

class CursosAdminController extends Controller
{
    
    public function index()   
    {
        $cursos= Cursos::paginate(10);
        return view('cursos.area-admin.cursos.cursos-index')->with(compact('cursos'));
    }

    public function create()
    {
        return view('cursos.area-admin.cursos.cursos-create');
    }

    // grabar NUEVO Curso
    public function store(Request $request)
    {
        // validacion sin redireccion automatica
        $validator = Validator::make($request->all(), [
            'titulo'=>'required|max:80|unique:cursos,titulo',
            'descripcion'=>'required|max:1200',
        ]);
    
        // en caso de error validacion (envia el error y campos por old() )
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // Guardar Objeto
        $cursos = new Cursos(); // Crea objeto
        // carga los valore de los campos 
        $cursos->titulo = $request->input('titulo');
        // si el campo es nulo pone un valor ''
        $cursos->descripcion = is_null($request->input('descripcion'))? '' : $request->input('descripcion');
            // capturar destacado y convertirlo en valor 1 y 0
            if($request->input('destacado')!=null){
                $destacado=1;
            }else{
                $destacado=0;
            }

        $cursos->destacado = $destacado;
        $cursos->detalle = $request->input('detalle');
        $cursos->save(); // guarda el registro

        // redireccion
        $request->session()->flash('notificacion', 'Nuevo Curso se ha registrado');
        return redirect()->route('admin-cursos.create');
    }

    public function show($id)
    {
        // detalle de cursos
        $curso= Cursos::find($id);
        // listado de materiales del cursos id
        $materiales=Cursos::find($id)->material()->paginate(2, ['*'], 'p1');;
        // listado de galeria fotos
        $galeriafotos=Cursos::find($id)->galeriafotos()->paginate(2, ['*'], 'p2');;
        // $galeriafotos->setPageName('other_page'); // multiple paginacion
        return view('cursos.area-admin.cursos.cursos-show')->with(compact('curso','materiales','galeriafotos'));
    }


    public function edit($id)
    {
         // detalle de cursos
         $curso= Cursos::find($id);
         // listado de materiales del cursos id
         $materiales=Cursos::find($id)->material()->paginate(2, ['*'], 'p1');;
         // listado de galeria fotos
         $galeriafotos=Cursos::find($id)->galeriafotos()->paginate(2, ['*'], 'p2');;
         // $galeriafotos->setPageName('other_page'); // multiple paginacion
         return view('cursos.area-admin.cursos.cursos-edit')->with(compact('curso','materiales','galeriafotos'));
    }

    // actualizar datos basicos del curso
    public function update(Request $request, $id)
    {
        // buscar el curso a editar
        $curso = Cursos::find($id);

        $curso->titulo = $request->input('titulo');
        // si el campo es nulo pone un valor ''
        $curso->descripcion = $request->input('descripcion');
     
        // capturar destacado y convertirlo en valor 1 y 0
        if($request->input('destacado')!=null){
            $destacado=1;
        }else{
            $destacado=0;
        }
        $curso->destacado = $destacado;

        $curso->detalle = $request->input('detalle');
        $curso->save(); // guarda el registro

        $request->session()->flash('report', 'Se ha Editado CURSOS');

        return back()->with(compact('curso'));

    }

    // borrar Curso
    public function destroy($id)
    {
        // eliminar relacion: usuarios ->  curso ID (solo many to many)
        $relacion = Cursos::find($id)->usuarios()->detach();   
        // eliminar relacion:  galeriafotos -> curso ID
        $relacion = Cursos::find($id)->galeriafotos()->delete();
        // eliminar relacion:  material -> curso ID
        $relacion = Cursos::find($id)->material()->delete();
        // eliminar relacion:  diploma -> curso ID
        $relacion = Cursos::find($id)->diploma()->delete();
        // eliminar relacion: comentarios -> curso ID (solo many to many)
        $relacion = Cursos::find($id)->comentarios()->detach();
        
        $curso = Cursos::find($id);
        $curso->delete(); // Borra el registro       
        // back
        return back(); 
    }
   
    // retornar
    public function retorno()
    {
        return back();
    }
}
