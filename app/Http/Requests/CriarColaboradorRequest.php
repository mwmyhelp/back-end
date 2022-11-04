<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarColaboradorRequest extends FormRequest
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
        $rules = ['dados.celular' => 'sometimes|nullable|celular_com_ddd',
            'dados.cpf' => 'required|string|cpf|unique:users,cpf',
            'dados.email' => 'required|email',
            'dados.estado_civil' => 'required',
            'dados.nascimento' => 'required|date',
            'dados.nome' => 'required',
            'dados.sangue' => 'sometimes|nullable',
            'dados.sobrenome' => 'required',
            'desenvolvimento.experiencias' => 'sometimes|nullable',
            'desenvolvimento.formacao_academica' => 'sometimes|nullable',
            'desenvolvimento.habilidades_naturais' => 'sometimes|nullable',
            'desenvolvimento.nivel_formacao' => 'required',
            'desenvolvimento.vem_ao_trabalho' => 'required',
            'institucional.admissao' => 'required|date',
            'institucional.chefia_imediata' => 'sometimes|nullable',
            'institucional.empresa_anterior' => 'sometimes|nullable',
            'institucional.posicoes_ocupadas' => 'sometimes|nullable|array',
            'institucional.tipo_acesso' => 'required',
            'outros.atividades_lazer' => 'sometimes|nullable',
            'outros.gostos_comida' => 'sometimes|nullable',
            'outros.idade_filhos' => 'sometimes|nullable',
            'outros.numero_filhos' => 'required|numeric'];

        return $rules;
    }
}
