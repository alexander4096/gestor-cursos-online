<?php

namespace cursos\Http\Controllers;

use cursos\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // validacion

class AlumnoAdminController extends Controller
{
    
    public function index()
    {
        $alumnos= User::paginate(5);
        return view('cursos.area-admin.alumnos.alumnos-listado')->with(compact('alumnos'));  
    }

    public function create()
    {
        return view('cursos.area-admin.alumnos.alumnos-crear-admin'); 
    }

    // Registrar Formulario Alumno
    public function store(Request $request)
    {
         // validacion sin redireccion automatica
         $validator = Validator::make($request->all(), [
            'name'=>'required|alpha_num|min:4',
            'email'=>'required|email|unique:user_admin,email',
            'password'=>'min:4|alpha_num',
            'password_confirmation'=>'min:4|alpha_num|same:password',
        ]);
 
        // en caso de error validacion (envia el error y campos por old() )
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // Guardar Objeto
        $User = new User(); // Crea objeto
        // carga los valore de los campos 
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password =  bcrypt($request->input('password'));
        $User->save(); // guarda el registro
        
        // con este codigo de session no hace falta declara el uso ya que lo toma del $request
        $request->session()->flash('notificacion', 'Nuevo usuario Alumno Registrado');
        return redirect()->route('admin-alumnos.create');
    }

    public function show($id)
    {
        $alumno = User::find($id); // la var $id corresponde al id usuario
        return view('cursos.area-admin.alumnos.alumnos-ver-admin')->with(compact('alumno'));  
    }

    
    public function edit($id)
    {
       $alumno = User::find($id); // la var $id corresponde al id usuario
       return view('cursos.area-admin.alumnos.alumnos-edit-admin')->with(compact('alumno'));  
    }

    // respuesta al FORM Metodo PUT (para EDIT)
    public function update(Request $request,$id)
    {
       // carga los valore de los campos 
       $alumno=User::find($id);
       $alumno->name = $request->input('name');
       $alumno->email = $request->input('email');
       // si no es verdadero, hay que cambiar la clave 
       if(!empty($request->input('password'))) {
            $alumno->password =  bcrypt($request->input('password'));
       }
       
       $alumno->save(); // guarda el registro
       $request->session()->flash('notificacion', 'Se ha Editado');
       return back()->with(compact('alumno'));
    }

    // respuesta al FORM Metodo DETELE (para Borrar)
    public function destroy($id)
    {
        // eliminar relacion entre cursos y alumnos
        $relacion = User::find($id)->cursos()->detach();   
        
        $alumno=User::find($id);
        $alumno->delete(); // Borra el registro       
        // back
        return back(); 
    }
}
