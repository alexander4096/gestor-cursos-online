<?php

namespace cursos\Http\Controllers;

use cursos\User_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use cursos\User;
use cursos\Cursos;
use cursos\Material;
use cursos\Comentarios; // carga el modelo

class User_adminController extends Controller
{
    
    public function index()
    {
        // chequea si se ha autetificado para buscar el id del usuario alumno
        if(Auth::check()) 
        {
            // obtener el id del usuario logueado (alumno)
            $id= Auth::user()->id;
            // carga el objetos
            $cursos= User::find($id)->cursos()->paginate(2);
        } else {
            $cursos='';
        }
      
        return view('cursos.cursos-registrados')->with(compact('cursos'));
    }
   
    public function itemsCurso($id) 
    {
        // solo 4 items de material por pagina
        $materiales=Cursos::find($id)->material()->paginate(2);
        return view('cursos.items-del-curso')->with(compact('materiales'));
    }

    public function materialCurso($id) 
    {
      $material=Material::find($id);
      return view('cursos.tema-del-item')->with(compact('material'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //  registrar comentario
    public function store(Request $request)
    {
         // Guardar Objeto
         $Comentarios = new Comentarios(); // Crea objeto
         // carga los valore de los campos 
         $Comentarios->comentario = $request->input('comentario');
         $Comentarios->id_curso = $request->input('id_curso');
         $Comentarios->id_user = $request->input('id_user');
         $Comentarios->save(); // guarda el registro
 
         // redireccion
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \cursos\User_admin  $user_admin
     * @return \Illuminate\Http\Response
     */
    public function show(User_admin $user_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cursos\User_admin  $user_admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User_admin $user_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\User_admin  $user_admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_admin $user_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cursos\User_admin  $user_admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_admin $user_admin)
    {
        //
    }
}
