<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\User_admin;
use cursos\User;
use cursos\Cursos;
use cursos\Comentarios;
use cursos\Galeriafotos;
use cursos\Material;
use cursos\Diploma;
use Session; // usar variable de session
use Illuminate\Support\Facades\Validator; // validacion

class AdminController extends Controller
{
        
    // ------------------------------------------------------------
    // administrador (index)
    public function index()
    {
        return view('cursos.capas.template-admin');
    }

    // admin para usuarios administradores 
    public function admin()
    {
        $admins=User_Admin::paginate(4);
        return view('cursos.area-admin.administrador.admin-listado')->with(compact('admins'));
    }
          
                // subgrupo administrador CRUD
                // admin crear
                public function admin_crear()
                {
                    return view('cursos.area-admin.administrador.admin-crear-admin');
                }
                // store para admin crear
                public function registrar_crear_admin(Request $request) 
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
                    $User_admin = new User_admin(); // Crea objeto
                    // carga los valore de los campos 
                    $User_admin->name = $request->input('name');
                    $User_admin->email = $request->input('email');
                    $User_admin->password =  bcrypt($request->input('password'));
                    $User_admin->save(); // guarda el registro

                    Session::flash('notificacion', 'Nuevo usuario Admin Registrado');
                    return redirect()->route('RegistrarAdmin');
                
                }

                // admin ver
                public function admin_ver($id)
                {
                    $admin=User_Admin::find($id);
                    return view('cursos.area-admin.administrador.admin-ver-admin')->with(compact('admin'));
                }
                // admin edit
                public function admin_edit($id)
                {
                    $admin=User_Admin::find($id);
                    return view('cursos.area-admin.administrador.admin-edit-admin')->with(compact('admin'));
                }
                // admin update
                public function update(Request $request, $id) 
                { 
                    // verifica si el campo password ha sido llenado
                    $password = empty($request->input('password'));
                    
                     // carga los valore de los campos 
                     $admin=User_Admin::find($id);
                     $admin->name = $request->input('name');
                     $admin->email = $request->input('email');
                     // si no es verdadero, hay que cambiar la clave 
                     if(!$password) {
                        $admin->password =  bcrypt($request->input('password'));
                     }
                     
                     $admin->save(); // guarda el registro

                     $request->session()->flash('notificacion', 'Se ha Editado');
                     return back()->with(compact('admin'));
                }

                // admin borrar
                public function admin_borrar($id)
                {
                    // ubicar el ID  administrador
                    $admin=User_Admin::find($id);
                    $admin->delete(); // Borra el registro           
                    // back
                    return back(); 
                }
                

    // fin admin --------------------------------------
   // -------------------------------------------------


    // Cursos para administrador
    public function cursos()
    {
        return view('cursos.area-admin.cursos.cursos-listado');
    }

    // Comentarios para administrador
    public function comentarios()
    {
        return view('cursos.area-admin.comentarios.comentarios-listado');
    }
}
