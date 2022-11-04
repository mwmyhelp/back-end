<?php

namespace App\Http\Requests\PessoaFisica;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class CreatePessoaFisicaRequest extends FormRequest
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|cpf',
            'telefone_celular' => 'required',
            'email' => 'required|email',
        ];

        return $rules;
    }
}
