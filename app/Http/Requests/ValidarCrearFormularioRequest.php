<?php

namespace cursos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use cursos\Rules\Mayusculas; // nueva regla Mayusculas

class ValidarCrearFormularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>new Mayusculas(),
            'email'=>'email|required|unique:user_admin,email',
            'password'=>'min:8|alpha_num|required',
            'password_confirmation'=>'min:8|alpha_num|required|same:password',
        ];
    }

    // este metodo es opcional y permitira modificar el mensaje de
    // error en la validacion
    public function messages()
    {
        return [
            'name.min' => 'Name minimo permitido 4 caracteres',
            'name.required' => 'Name es un campo obligatorio',
            'email.email' => 'Email debe ser uno valido con @ y dominio',
            'email.required' => 'Email es un campo obligatorio',
            'email.unique' => 'Email debe ser unico (hay otro registrado)',
            'password.min' => 'Password minimo permitido 8 caracteres',
            'password.alpha_num' => 'Password solo carateres alfanumericos',
            'password.required' => 'Password es un campo obligatorio',
            'password_confirmation.min' => 'Password confirmacion minimo permitido 8 caracteres',
            'password_confirmation.alpha_num' => 'Password confirmacion solo carateres alfanumericos',
            'password_confirmation.required' => 'Password confirmacion es un campo obligatorio',
            'password_confirmation.same' => 'Password confirmacion debe ser igual a campo Password',
        ];
    }
    
}
