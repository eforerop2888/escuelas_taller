<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreModulos extends FormRequest
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
            'nombre_modulos' => 'required',
            'duracion' => 'required|numeric',
            'tipo_modulo' => 'required|numeric',
            'objetivo' => 'required|max:500',
            'nombre_maestro' => 'required',
            'mail_maestro' => 'required|email',
            'experiencia' => 'required|max:500',
            'programa_id' => 'required'
        ];
    }
}
