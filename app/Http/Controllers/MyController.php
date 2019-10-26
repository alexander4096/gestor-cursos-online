<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use cursos\Exports\UsersExport;
use cursos\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use cursos\Http\Controllers\Controller;

class MyController extends Controller
{

    public function importExportView()
    {
       return view('import');
    }
   
    // si funciona!!!
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
