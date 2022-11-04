<?php

namespace App\Http\Requests\Endereco;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class CreateEnderecoRequest extends FormRequest
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
        $rules = [
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'nome_cidade' => 'required',//necessário devido a base de dados
            'uf' => 'required',//necessário devido a base de dados
            'bairro' => 'required',//necessário devido a base de dados
        ];

        return $rules;
    }
}
