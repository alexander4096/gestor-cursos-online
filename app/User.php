<?php

namespace cursos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relacion muchos a muchos 
    public function cursos()
    {
        return $this->belongsToMany('cursos\Cursos', 'cursos_users', 'id_user', 'id_curso');
    }


    // relacion muchos a muchos (cursos -> comentarios)
    // tiene extra parametro ->withPivot('comentario');
    // para leer la tabla pivote
    public function comentarios()
    {
        return $this->belongsToMany('cursos\Cursos', 'comentarios','id_curso', 'id_user')->withPivot('comentario','created_at','updated_at');
    }

    
}
