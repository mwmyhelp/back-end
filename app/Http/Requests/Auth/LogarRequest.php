<?php

namespace App\Http\Requests\Auth;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class LogarRequest extends FormRequest
{

    use ResponseJson;

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
            'cpf' => 'required|cpf', 'password' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'cpf' => 'CPF invalido!'
        ];
    }
}
