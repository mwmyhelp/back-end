<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtribuicaoRequest extends FormRequest
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
        $rules = [
            'anexar_em' => 'required|string|in:colaborador,cargo',
            'anexar_id' => 'required',
            'descricao' => 'required|string|min:5'
        ];

        return $rules;
    }
}
