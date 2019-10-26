<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Exports\UsuariosExportar;     // carga  clase controlador Exportar Excel
use cursos\Imports\UsuarioAdminImport;   // carga  clase controlador Importar Excel
use Maatwebsite\Excel\Facades\Excel;     // carga parqueta Maatwebsite Excel
use cursos\Http\Controllers\Controller;  // carga Controller

class ControladorParaExcel extends Controller
{
    // vista de gestion para carga de archivos / exportacion de archivos
    public function importarExportarEnVista()
    {
       return view('importar');
    }
   
    // para importar
    public function importar(Request $request) 
    {
        Excel::import(new UsuarioAdminImport,$request->file('file'));       
        return back();
    }

    // para exportar
    public function exportar() 
    {
        return Excel::download(new UsuariosExportar, 'usuarioAdmin.xlsx');
    }
   
    
}
