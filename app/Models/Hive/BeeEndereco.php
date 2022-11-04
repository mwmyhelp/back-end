<?php

namespace App\Models\Hive;

use App\Traits\Uuids;
use App\Traits\Validation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use laravelApiHelpers\FormatHelper;

class BeeEndereco extends Model
{
    use Uuids;
    use HasFactory;
    /** Validação de modelo **/
    use Validation;
    protected $regras = [
        'cep' => 'required|numeric|digits:8',
        'ibge_cidade' => 'sometimes|numeric',
        'nome_cidade' => 'required|string|max:100',
        'uf' => 'required|string|size:2',
        'logradouro' => 'required|string|max:100',
        'numero' => 'required|string|max:50',
        'bairro' => 'required|string|max:50',
        'complemento' => 'sometimes|nullable|string|max:200'
    ];

    /** Tabela de acesso aos dados */
    protected $table = 'bee_enderecos';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['cep','ibge_cidade','nome_cidade','uf','logradouro','numero','bairro','complemento'];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Métodos Acessores para o modelo
     */
    //------

    //------
    /**
     * Métodos Mutadores para o modelo
     */
    //------
    public function setCepAttribute($cep){
        $this->attributes['cep'] = FormatHelper::apenasNumeros($cep);
    }
    public function setIbgeCidadeAttribute($ibge){
        $this->attributes['ibge_cidade'] = FormatHelper::apenasNumeros($ibge);
    }
    //------
    /**
     * Relacionamentos com outros modelos
     */
    //------

    //------

}
