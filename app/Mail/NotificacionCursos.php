<?php

namespace cursos\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use cursos\User; // agrega el modelo a consultar

class NotificacionCursos extends Mailable
{
    use Queueable, SerializesModels;
    
    // variables que se pasan a la vista
    public $cursos;
    public $usuario;
    public $subject;
    public $para;
    public $titleTo;

    public function __construct($id,$subject,$para,$titleTo)
    {
         // carga de datos 
        $this->cursos= User::find($id)->cursos;
        $this->usuario= User::find($id);
        // configurando valores del mail
        $this->subject =$subject;
        $this->para  = $para;
        $this->titleTo = $titleTo;
    }

    public function build()
    {     
        // leyendo plantilla de email
        return $this->view('plantillaEmail02')
        ->subject($this->subject)
        ->to($this->para,$this->titleTo);
    }
}
