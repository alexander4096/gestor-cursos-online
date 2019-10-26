<?php

namespace cursos\Http\Controllers\Auth;

use Illuminate\Http\Request;
use cursos\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() 
    {
       $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('cursos.ingresar-admin');
    }

    public function login(Request $request)
    {
      
       // validate the form data
       $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:3'
       ]);

       // attempt to log the user
       if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)) {
          // if successful
          return redirect()->intended(url('/admin-index'));
       }

       // if unseccessful
       return redirect()->back()->withInput($request->only('email','remember'));
    }

}

