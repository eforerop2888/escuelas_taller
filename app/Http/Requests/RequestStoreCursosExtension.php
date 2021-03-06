<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreCursosExtension extends FormRequest
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
            'nombre_curso' => 'required',
            'objetivo_curso' => 'required|max:500',
            'duracion' => 'required|numeric',
            'costo' => 'required|numeric',
            'temas' => 'required|max:500'
        ];
    }
}
