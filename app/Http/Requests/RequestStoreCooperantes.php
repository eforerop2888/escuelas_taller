<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreCooperantes extends FormRequest
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
            'nombre_cooperante' => 'required',
            'persona_contacto' => 'required',
            'mail_contacto' => 'required|email',
            'programa' => 'required',
            'tipo_cooperacion' => 'required|max:500',
            'resultados_significativos' => 'required|max:500',
        ];
    }
}
