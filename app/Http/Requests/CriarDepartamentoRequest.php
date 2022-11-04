<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CriarDepartamentoRequest extends FormRequest
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
        $request = request();
        /** Regras para criação de departamentos **/
        $rules = [
            'id_pai' => 'sometimes|nullable|string|size:36|exists:empresa_departamentos,id',
            'titulo' => [
                'required',
                'string',
                'max:100'
            ]
        ];

        return $rules;
    }
}
