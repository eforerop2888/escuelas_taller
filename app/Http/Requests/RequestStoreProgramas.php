<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreProgramas extends FormRequest
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
            'nombre_programa' => 'required',
            'duracion_meses' => 'required|numeric',
            'duracion_horas' => 'required|numeric',
            'duracion_practica' => 'required|numeric',
            'objetivo_programa' => 'required|max:500',
            'requisitos_ingreso' => 'required|max:500',
            'trabajo_egresados' => 'required|max:500',
            'escuelas_id' => 'required'
        ];
    }
}
