<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqUsuario extends FormRequest
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
        $accion=$this->input('accion');
        switch ($accion) {
            case 'nuevo':
                return [
                    'perfil'=>'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'nombres'=>'required',
                    'apellidos'=>'required',
                    'cedula'=>'required|ecuador:ci|unique:users,cedula',
                    'telefono'=>'nullable|numeric|digits_between:1,10',
                    'sexo'=>'required',
                    'estado'=>'required',
                    'direccion'=>'nullable'
                ];
                break;
            case 'editar':
                $id=$this->input('id');
                return [
                    'perfil'=>'required',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                    'nombres'=>'required',
                    'apellidos'=>'required',
                    'cedula'=>'required|ecuador:ci|unique:users,cedula,'.$id,
                    'telefono'=>'nullable|numeric|digits_between:1,10',
                    'sexo'=>'required',
                    'estado'=>'required',
                    'direccion'=>'nullable'
                ];
                break;
        }
    }

    public function messages()
    {
        return[
            'cedula.ecuador'=>'Cédula incorrecta'
        ];
    }
}
