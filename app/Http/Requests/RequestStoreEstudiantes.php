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
            'total_hombres' => 'required|numeric',
            'total_mujeres' => 'required|numeric',
            'blanco_mujeres' => 'numeric',
            'blanco_hombres' => 'numeric',
            'caucasico_mujeres' => 'numeric',
            'caucasico_hombres' => 'numeric',
            'afrodescendiente_mujeres' => 'numeric',
            'afrodescendiente_hombres' => 'numeric',
            'indigena_mujeres' => 'numeric',
            'indigena_hombres' => 'numeric',
            'mestizo_mujeres' => 'numeric',
            'mestizo_hombres' => 'numeric',
            'raizal_isleno_mujeres' => 'numeric',
            'raizal_isleno_hombres' => 'numeric',
            'rom_gitano_mujeres' => 'numeric',
            'rom_gitano_hombres' => 'numeric',
            'criollo_mujeres' => 'numeric',
            'criollo_hombres' => 'numeric',
            'amerindio_mujeres' => 'numeric',
            'amerindio_hombres' => 'numeric',
            'polinesio_mujeres' => 'numeric',
            'polinesio_hombres' => 'numeric',
            'melanesio_mujeres' => 'numeric',
            'melanesio_hombres' => 'numeric',
            'asiatico_mujeres' => 'numeric',
            'asiatico_hombres' => 'numeric',
            'victimas_hombres' => 'numeric',
            'victimas_mujeres' => 'numeric',
            'excombatientes_hombres' => 'numeric',
            'excombatientes_mujeres' => 'numeric',
            'desplazados_hombres' => 'numeric',
            'desplazados_mujeres' => 'numeric',
            'pobreza_hombres' => 'numeric',
            'pobreza_mujeres' => 'numeric',
            'cabeza_hombres' => 'numeric',
            'cabeza_mujeres' => 'numeric',
            'certificados_hombres' => 'numeric',
            'certificados_mujeres' => 'numeric',
            'egresados_programa_hombres' => 'numeric',
            'egresados_programa_mujeres' => 'numeric',
            'egresados_trabajo_hombres' => 'numeric',
            'egresados_trabajo_mujeres' => 'numeric',
            'egresados_trabajo_otro_hombres' => 'numeric',
            'egresados_trabajo_otro_mujeres' => 'numeric',
            'egresados_desempleados_hombres' => 'numeric',
            'egresados_desempleados_mujeres' => 'numeric',
            'causas_desercion' => 'max:500',
            'observaciones' => 'max:500'
        ];
    }
}
