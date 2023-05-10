<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqCertificado extends FormRequest
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
                    'numeroEmision' => 'required|integer|unique:certificado,numeroEmision',
                    'cliente' => 'required'
                ];
                break;
            
            case 'editar':
                $id=$this->input('id');
                return [
                    'numeroEmision' => 'required|integer|unique:certificado,numeroEmision,'.$id,
                    'cliente' => 'required'
                ];
                break;
        }
    }
}
