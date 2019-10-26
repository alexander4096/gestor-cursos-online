<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;
use Mail; // clase Mail
use cursos\User;

// llama a la clase Mailable
use cursos\Mail\NotificacionCursos;


class CorreoController extends Controller
{
    public function basico()
    {
        
        $texto='este es el cuerpo del texto';
        // envio de texto plano con Laravel
        Mail::send(array(), array(), function ($message) use ($texto) {
            $message->to('alexander4096@hotmail.com')
              ->subject('texto plano')
              ->from('alexander1973r@gmail.com', 'Admin User')
              ->setBody($texto, 'text/plain');
          });

          // confirmacion de envio emails
          if( count(Mail::failures()) > 0 ) {

            echo "There was one or more failures. They were: <br />";
         
                foreach(Mail::failures() as $email_address) {
                    echo " - $email_address <br />";
                }
         
            } else {
                echo "No errors, all sent successfully!";
            }
            
    }

    // envio correo por plantilla
    public function plantilla()
    {
        $to='alexander4096@hotmail.com';
        $titleTo='Programmer';
        $subject='Aviso de Novedades Laravel';
        $title='Este es el titulo del cuerpo Email';
        $content='Vea las novedades del manual Laravel...';

        Mail::send('plantillaEmail01', ['title' => $title, 'content' => $content], function ($message) use($to, $subject, $titleTo)
        {
            $message->to($to, $titleTo);
            $message->subject($subject);
        });
        return 'Correo Enviado';
    }

   // envio correo por plantilla
   // cargando una consulta
   public function plantillaV2() 
   {
    // carga de datos 
    $cursos= User::find(5)->cursos;
    $usuario= User::find(5);
    // datos del email
    $to='alexander4096@hotmail.com';
    $titleTo='Programmer';
    $subject='Aviso de Novedades Laravel';
    // envio de correo
    Mail::send('plantillaEmail02', ['cursos' => $cursos, 'usuario' => $usuario], function ($message) use($to, $subject, $titleTo)
    {
        $message->to($to, $titleTo);
        $message->subject($subject);
    });
    return 'Correo Enviado V2';
   }

   // metodo que usa el mailable
   function mailable() 
   {

    // datos del email
    $para='alexander4096@hotmail.com';
    $titleTo='Programmer';
    $subject='Laravel Mailable';
    // id carga de datos 
    $id=5;
 
    // llama a la clase mailable: 
    Mail::to($para)->send(new NotificacionCursos($id,$subject,$para,$titleTo));

    return "Enviado Mailable";
   }
}
