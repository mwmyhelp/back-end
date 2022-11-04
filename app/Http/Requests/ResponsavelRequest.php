<?php

namespace App\Http\Requests;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class ResponsavelRequest extends FormRequest
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
            'tipo' => 'required|in:fisica,juridica',
            'nome' => 'required_if:pessoa.tipo,fisica',
            'sobrenome' => 'required_if:pessoa.tipo,fisica',
            'cpf' => 'required_if:pessoa.tipo,fisica|cpf',
            'nascimento' => 'required_if:pessoa.tipo,fisica|date',

            'razao_social' => 'required_if:pessoa.tipo,juridica,',
            'nome_fantasia' => 'required_if:pessoa.tipo,juridica',
            'cnpj' => 'required_if:pessoa.tipo,juridica|cnpj',
            'email' => 'required|email'
        ];

        return $rules;
    }
}
