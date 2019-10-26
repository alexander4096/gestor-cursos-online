<?php

namespace cursos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User_admin extends Authenticatable
{
    protected $guard = 'user_admin';
    // indica al modelo cual tabla se va manejar
    protected $table = 'user_admin';


    // para cargar Masiva de datos (Ej: Excel)
    protected $fillable = ['name', 'email', 'password'];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

}
