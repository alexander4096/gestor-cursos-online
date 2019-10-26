<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\User_admin; // usuario Administrador
use Illuminate\Support\Facades\Validator; // validacion
use cursos\Http\Requests\ValidarCrearFormularioRequest; // usando el REQUEST

class FormularioValidadoController extends Controller
{
  
      // index
      public function index()
      {
          $User_admins=User_Admin::paginate(8);
          return view('FormListadoValidado')->with(compact('User_admins'));
      }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FormCreateValidado');
    }

    // almacenar formulario
    public function store(ValidarCrearFormularioRequest $request)
    {
       
        // si la validacion es correta se corre este codigo
        // Guardar Objeto
        $User_admin = new User_admin(); // Crea objeto
        // carga los valore de los campos 
        $User_admin->name = $request->input('name');
        $User_admin->email = $request->input('email');
        $User_admin->password =  bcrypt($request->input('password'));
        $User_admin->save(); // guarda el registro

        $request->session()->flash('notificacion', 'Nuevo usuario Admin Registrado');
        return back();
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin=User_Admin::find($id);
        return view('FormEditarValidado')->with(compact('admin'));
    }

    public function update(Request $request, $id)
    {   

        // verifica si hay que validad la confirmacion de password
        $passConfirm = empty($request->input('password'))? 'nullable' : '';

        // validacion sin redireccion automatica
        $validator = Validator::make($request->all(), [
            'name'=>'min:4|required',
            'email'=>'email|required|unique:user_admin,email,'.$id,'',
            'password'=>'nullable|min:8|alpha_num',
            'password_confirmation'=>''. $passConfirm .'|min:8|alpha_num|same:password',
        ]);

        // en caso de error validacion (envia el error y campos por old() )
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // verifica si el campo password ha sido llenado
        $password = empty($request->input('password'));

        // carga los valore de los campos correspondientes al ID
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


   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
