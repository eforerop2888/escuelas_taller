<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGenerateInform extends FormRequest
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
            'pais' => 'required|numeric|not_in:0',
            'tipo_informe' => 'required|numeric|not_in:0',
            'escuela' => 'required|numeric|not_in:0'
        ];
    }
}
