<?php

namespace App\Http\Requests\Conta;

use App\Helpers\RuleHelper;
use App\Http\Requests\Endereco\CreateEnderecoRequest;
use App\Http\Requests\PessoaFisica\CreatePessoaFisicaRequest;
use App\Http\Requests\PessoaJuridica\CreatePessoaJuridicaRequest;
use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class BeeContaRequest extends FormRequest
{

    use ResponseJson;

    private $responsavel, $endereco, $pessoa_juridica;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {

        $this->responsavel = new CreatePessoaFisicaRequest();
        $this->pessoa_juridica = new CreatePessoaJuridicaRequest();
        $this->endereco = new CreateEnderecoRequest();
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {

        $pessoa = $this->responsavel->rules();
        $empresa = $this->pessoa_juridica->rules();
        $endereco = $this->endereco->rules();

        $rules = [
            'plano_selecionado' => 'required',
            'imagem_perfil' => 'sometimes|nullable|image|mimes:png,jpg,jpeg',
        ];

        return RuleHelper::create()
            ->addPrefix('conta', $rules)
            ->addPrefix('pessoaJuridica', $empresa)
            ->addPrefix('pessoaFisica', $pessoa)
            ->addPrefix('endereco', $endereco)
            ->build();
    }


    public function attributes()
    {
        $pessoa = $this->responsavel->attributes();
        $empresa = $this->pessoa_juridica->attributes();
        $endereco = $this->endereco->attributes();

        $attributes = [
            'imagem_perfil' => 'Imagem do perfil',
        ];

        return RuleHelper::create()
            ->addPrefix('conta', $attributes)
            ->addPrefix('pessoaJuridica', $empresa)
            ->addPrefix('pessoaFisica', $pessoa)
            ->addPrefix('endereco', $endereco)
            ->build();
    }
}
