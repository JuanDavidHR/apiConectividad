<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nombre' => 'string|required|min:5|max:50',
            'apellidos' => 'string|required|min:5|max:50',
            'num_documento' => 'required|min:9999999|max:999999999|numeric|unique:entidad,num_documento',
            'password' => 'string|required|min:5|max:20',
            'idRol' => 'not_in:0',
            'idTipo' => 'not_in:0',
            'idArea' => 'not_in:0',
            'email'=> 'required|email|min:3|max:40',
            'telefono' => 'required|min:100000000|max:1000000000000|numeric', 
        ];
    }
    public function messages(){
        return [
            'nombre.string' => 'Ingrese Nombre',
            'nombre.required' => 'Ingrese Nombre',
            'nombre.min' => 'Nombre debe de tener de 5 a 50 dígitos',
            'nombre.max' => 'Nombre debe de tener de 5 a 50 dígitos',
            'num_documento.string' => 'Ingrese DNI',
            'num_documento.required' => 'Ingrese DNI',
            'num_documento.min' => 'DNI debe de tener 8 dígitos',
            'num_documento.max' => 'DNI debe de tener 8 dígitos',
            'num_documento.unique' => 'DNI duplicado',
            'password.string' => 'Ingrese Password',
            'password.required' => 'Ingrese Password',
            'password.min' => 'Password debe de tener de 5 a 20 dígitos',
            'password.max' => 'Password debe de tener de 5 a 20 dígitos',
            'email.email' => 'Ingrese Email',
            'email.required' => 'Ingrese Email',
            'email.min' => 'Ingrese Email',
            'email.max' => 'Ingrese Email',
            'telefono.required' => 'Ingrese Teléfono',
            'telefono.numeric' => 'Ingrese Teléfono',
            'telefono.max' => 'Ingrese Teléfono',
            'telefono.min' => 'Ingrese Teléfono'
        ];
    }
}