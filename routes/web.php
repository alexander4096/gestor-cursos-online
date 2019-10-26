<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ejemplo Paginacion
Route::get('/paginacionBasica', 'PaginaController@paginacionbasica'); 
Route::get('/paginacionMultiple', 'PaginaController@paginacionmultiple');
Route::get('/paginacionBusqueda', 'PaginaController@paginacionbusqueda');

// Envio de Correo
Route::get('/correoEnvioBasico', 'CorreoController@basico'); 
Route::get('/correoEnvioPlantilla', 'CorreoController@plantilla'); 
Route::get('/correoEnvioPlantillaV2', 'CorreoController@plantillaV2'); 
Route::get('/correoMailablesV1', 'CorreoController@mailable'); 

// Ejemplo Form
Route::resource('form-basico','FormBaseController');


//  Ejemplo importar Excel
Route::get('importarExportarVista', 'ControladorParaExcel@importarExportarEnVista');
Route::post('importar', 'ControladorParaExcel@importar')->name('importar');
Route::get('exportar', 'ControladorParaExcel@exportar')->name('exportar');

// subir archivos
Route::get('subirArchivo', 'ControladorSubirArchivo@vista');
Route::post('subirArchivo', 'ControladorSubirArchivo@subir')->name('subirArchivo');

// solo vista
Route::view('/welcome2019', 'welcome');

// Ejemplo de redireccion
Route::get('micasa',function() {
    return '<h1>Esta es MI CASA</h1>'; 
});
Route::get('tucasa',function() {
    return '<h1>Esta es TU CASA</h1>'; 
});
    // ahora mi casa es tu casa tambien
Route::redirect('micasa','tucasa');

// view
Route::view('/nueva/vista/2019', 'nuevaVista');

//name
Route::get('menuPPAL', function() {
 return view('menu');
});

Route::get('ruta/larga/por/url', function() {
    return view('submenu');
   })->name('largo');

// get
Route::get('una/nueva/ruta', function() {
    return view('nuevaRuta');
});

// get con parametro
Route::get('getparametro/{id}/verID', function($id) {
    return view('getparametro')->with('id', $id);
});

// get 
Route::get('postparametro', function() {
    return view('formulariopostparametro');
});
// post 
Route::post('postparametro', function() {
    return view('postparametro');
});

// usando el metodo put
Route::put('putmetodo', function() {
    return view('putmetodo');
});
Route::view('putmetodo','putFormulario');

// usando el metodo DELETE
Route::delete('deletemetodo', function() {
    return view('deletemetodo');
});
Route::view('deletemetodo','deleteFormulario');


// RESOURCE
Route::resource('recursoCRUD','CRUDController');

// Ejemplo de Subdirectorio en controladores
Route::get('SaludoRuta', 'ruta\MiRutaController@saludo');
Route::get('DespedidaRuta', 'ruta\MiRutaController@despedida');

// invoke 
Route::get('invoke', 'MiInvokableController');


// EJEMPLO AJAX Lectura / Listar Registros
Route::get('AjaxLectura', 'AjaxLecturaController@paginacionbusqueda');

// EJEMPLO AJAX Creacion de registro
Route::get('AjaxCrear', 'AjaxCrearController@create');
Route::post('AjaxCrear','AjaxCrearController@store');

// EJEMPLO AJAX Editar un registro
Route::get('AjaxEditar/{id}/editar', 'AjaxEditarController@editar');
Route::put('AjaxEditar/{id}','AjaxEditarController@update');

// EJEMPLO AJAX Eliminar un registro
Route::delete('AjaxEliminar/{id}', 'AjaxLecturaController@destroy');

// EJEMPLO DE VALIDACION
Route::resource('validacion-formulario','FormularioValidadoController');

// EJEMPLO DE MIDDLEWARE PARA UNA RUTA
Route::get('DemoAlumnoVistaMiddleware', function() {
        return view('DemoAlumnoVistaMiddleware');
 })->middleware('AlumnoAuthDemo');


 // EJEMPLO DE MIDDLEWARE PARA VARIAS RUTAS
 Route::middleware(['AdminAuthDemo'])->group(function() {
     Route::get('AdminDemoEditar', function() {
        return view('AdminDemoEditar');
        });
     Route::get('AdminDemoVer', function() {
            return view('AdminDemoVer');
         });
     Route::get('AdminDemoBorrar', function() {
            return view('AdminDemoBorrar');
         });
 });
 
// Ejemplo de pruebas varias
Route::get('/demo2019', function () {
    $nombre ='Alexander';
    $apellido="Rodriguez";
    $email='alexander4096@hotmail.com';
    dd($email);
    return view('pruebas.ficha', compact("nombre", "apellido", "email"));
});



// EJEMPLO de CRUD DateController
Route::resource('myDemoCRUD','DateController');

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// ruta para vista 
Route::get('/hola', function () {
     return view('hola');
});

// envio de informacion sin vista
Route::get('/prueba', function () {
    return '<h1>Un reporte desde Route</h1>';
});

// enviado datos a vista
Route::get('/saludos', function () {
    $name ='Alexander';
    return view('pruebas.hola')->with('nombre', $name);
});

// varios datos 
Route::get('/ficha', function () {
    $nombre ='Alexander';
    $apellido="Rodriguez";
    $email='alexander4096@hotmail.com';
    return view('pruebas.ficha', compact("nombre", "apellido", "email"));
});

// suma de dos valores
Route::get('/suma/{a?}/{b?}', function ($a=0,$b=0) {
    $resultado= $a + $b;
    return "La suma de ". $a . " + " . $b . " = " . $resultado;
});


// pruebas en blade
route::get('vista',function() {
    return view('vista01');
});

// creando un template
route::get('vista/principal',function() {
    return view('principal');
});

route::get('vista/secundaria',function() {
    return view('secundaria');
});


// varios idiomas
Route::get('idiomas/{locale}','idiomaController@indice');
Route::get('idiomas-contenido','idiomaController@contenido');


route::get('bienvenida',function() {
    return "<h1>bienvenida Laravel</h1>";
});


route::get('SaludosLaravel',function() {
    return view('welcome');
});
// ---------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------


// indice de cursos
Route::get('/', 'CursosController@index');

// listado de cursos (lista contenido cursos)
Route::get('/listado-cursos', 'CursosController@listadocursos');

// Detalle curso 
Route::get('/detalle-curso/{id}','CursosController@detallecurso');
// Registrar Curso alumno
Route::post('/detalle-curso','CursosController@store')->name('RegistrarCursoAlumno'); 

//------------------------------
// ADMIN Alumnos
//------------------------------
Route::middleware(['AlumnoAuth'])->group(function() {
    // Cursos Registrados Alumnos
    Route::get('/cursos-registrados', 'User_adminController@index');

    // Items del curso registrado
    Route::get('/items-del-curso/{id}', 'User_adminController@itemsCurso'); 
    Route::post('/items-del-curso/store', 'User_adminController@store')->name('RegistrarComentario'); 

    // Material del curso
    Route::get('/tema-del-item/{id}', 'User_adminController@materialCurso');
});
//---------------------------------

// INDEX Menu de adminstracion Super Usuario
Route::get('/admin-cursos', function () {
    return view('cursos.capas.template-admin');
});


// -------------------------------------------------------------------------
// Administracion Super Usuario
//--------------------------------------------------------------------------
Route::middleware(['AdminAuth'])->group(function() {
        // indice de administrador
        Route::get('/admin-index', 'AdminController@index');
        // area administrador
        Route::get('/admin-admin', 'AdminController@admin');
        // -------------------------------------------------------------------------
        // Administracion Super Usuario
        //--------------------------------------------------------------------------
        // sub grupo ADMINISTRADOR (crear)
        Route::get('/admin-crear-admin', 'AdminController@admin_crear');
        Route::post('/admin-crear-admin', 'AdminController@registrar_crear_admin')->name('RegistrarAdmin');
        // sub grupo ADMINISTRADOR (ver)
        Route::get('/admin-ver-admin/{id}', 'AdminController@admin_ver');
        // sub grupo ADMINISTRADOR (edit)
        Route::get('/admin-edit-admin/{id}', 'AdminController@admin_edit');
        Route::put('/admin-edit-admin/{id}', 'AdminController@update');
        // sub grupo ADMINISTRADOR (borrar)
        Route::delete('/admin-borrar-admin/{id}', 'AdminController@admin_borrar');
 
        // -------------------------------------------------------------------------
        // Alumnos (CRUD) area aministrador usando (resource)
        //--------------------------------------------------------------------------
        Route::resource('admin-alumnos','AlumnoAdminController');

        // -------------------------------------------------------------------------
        // Cursos (CRUD) todo el grupo (Cursos, Material, Diploma, GaleriaFotos)
        // -------------------------------------------------------------------------
        Route::resources([
            'admin-cursos' => 'CursosAdminController',
            'admin-diploma' => 'DiplomaAdminController',
            'admin-Material' => 'MaterialAdminController',
            'admin-fotos' => 'GaleriaFotosAdminController'
        ]);

        // -------------------------------------------------------------------------
        // Comentarios (CRUD) area aministrador usando (resource)
        //--------------------------------------------------------------------------
        Route::resource('admin-comentarios','ComentariosController');
        
        // retornar a la pagina anterior (probar con id dinamicos)
        // Route::get('admin-cursos/{id}/edit', 'CursosAdminController@retorno')->name('admin-cursos.retorno');
});       
// -------------------------------------------------------------------------



// ----------------------------------------------------------------------------


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ingresar administrador
Route::get('/ingresar-admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/ingresar-admin', 'Auth\AdminLoginController@login')->name('admin.login.submit');

// registrar administrador
Route::get('/registrar-admin', function () {
    return view('cursos.registrar-admin');
});

// Recuperar administrador
Route::get('/recuperar-admin', function () {
    return view('cursos.recuperar-admin');
});