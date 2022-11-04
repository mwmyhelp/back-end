<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CargoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = request();
        $rules = [
            'titulo' => [
                'required',
                'string',
                'max:200',
                Rule::unique('empresa_cargos')->where(function ($query) use ($request) {
                    //Unico nome
                    $query->where('titulo', $request->input('titulo'));
                    return $query->where('id_departamento', $request->route('id_departamento'));
                })
            ],
            'descricao_curta' => 'sometimes|nullable|string|max:250'
        ];

        return $rules;
    }
}
