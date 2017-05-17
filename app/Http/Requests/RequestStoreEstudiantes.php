<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreEstudiantes extends FormRequest
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
            'programa' => 'required',
            'etnia_hombres' => 'required|numeric',
            'etnia_mujeres' => 'required|numeric',
            'victimas_hombres' => 'required|numeric',
            'victimas_mujeres' => 'required|numeric',
            'excombatientes_hombres' => 'required|numeric',
            'excombatientes_mujeres' => 'required|numeric',
            'desplazados_hombres' => 'required|numeric',
            'desplazados_mujeres' => 'required|numeric',
            'pobreza_hombres' => 'required|numeric',
            'pobreza_mujeres' => 'required|numeric',
            'certificados_hombres' => 'required|numeric',
            'certificados_mujeres' => 'required|numeric',
            'causas_desercion' => 'required',
        ];
    }
}
