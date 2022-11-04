<?php

namespace App\Http\Requests\PessoaJuridica;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class CreatePessoaJuridicaRequest extends FormRequest
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
     */
    public function rules()
    {

        $rules = [
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'cnpj' => 'required|cnpj',
            'email' => 'required|email'
        ];

        return $rules;
    }
}
