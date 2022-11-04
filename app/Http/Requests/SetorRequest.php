<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetorRequest extends FormRequest
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
        /** ↓↓↓ Inativo por enquanto ***/
        $request = request();
        $rules = [
            'nome' => [
                'required',
                'string',
                'max:200'
            ]
        ];

        return $rules;
    }
}
