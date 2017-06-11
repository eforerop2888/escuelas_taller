<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreEscuelas extends FormRequest
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
            'nombre_escuela' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'director' => 'required',
            'email' => 'required|email',
            'coordinador' => 'required',
            'email_c' => 'required|email',
            'humano' => 'required',
            'email_h' => 'required|email',
            'acto' => 'required',
            'permiso' => 'required',
        ];
    }
}
