<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloBase extends Model
{
    use HasFactory;

    /** Tabela de acesso aos dados */
    protected $table = 'nome_da_tabela';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['created_at', 'updated_at', 'deleted_at', 'nome', 'pessoa_juridica_id', 'principal'];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = ['principal' => 'boolean'];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Métodos Acessores para o modelo
     */
    //------
    public function obterPrincipal()
    {
        /**
         * Retorna a Unidade Empresarial marcada como principal
         */
        return $this->where('principal', 1)->first();
    }
    //------
    /**
     * Métodos Mutadores para o modelo
     */
    //------

    //------
    /**
     * Relacionamentos com outros modelos
     */
    //------
    public function dados()
    {
        /**
         * Retorna os Dados Empresariais da Unidade Empresarial
         */
        return $this->hasOne('App\Models\App\PessoaJuridica', 'id', 'pessoa_juridica_id');
    }
    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
