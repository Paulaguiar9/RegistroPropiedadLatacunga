<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RqLibro extends FormRequest
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
        $n=$this->input('numeroTomo');
        $a=$this->input('anio');
        switch ($accion) {
            case 'nuevo':

                return [
                    
                    'tipo'=>'required',
                    'numeroTomo' => [
                        'required',
                        Rule::unique('libro')->where(function ($query) use($n,$a) {
                            return $query->where('numeroTomo', $n)
                            ->where('anio', $a);
                        }),
                    ],
                    'anio'=>'required|digits:4|integer|min:1900',
                    'partidaInicio'=>'required|integer',
                    'fojaInicio'=>'required|integer',
                    'fechaPartidaInicio'=>'required',
                    'partidaFin'=>'required|integer',
                    'fojaFin'=>'required|integer',
                    'fechaPartidaFin'=>'required',
                    'observacion'=>'nullable|max:255',
                ];


                break;
            
            case 'editar':
                 $id=$this->input('id');
                return [
            
                    'tipo'=>'required',
                    'numeroTomo' => [
                        'required',
                        Rule::unique('libro')->where(function ($query) use($n,$a,$id) {
                            return $query->where('numeroTomo', $n)
                            ->where('anio', $a)
                            ->where('id','!=',$id);
                        }),
                    ],

                    'anio'=>'required|digits:4|integer|min:1900',
                    'partidaInicio'=>'required|integer',
                    'fojaInicio'=>'required|integer',
                    'fechaPartidaInicio'=>'required',
                    'partidaFin'=>'required|integer',
                    'fojaFin'=>'required|integer',
                    'fechaPartidaFin'=>'required',
                    'observacion'=>'nullable|max:255',
                ];
                
                break;
        }
        
    }
}
