<?php

namespace App\Models\Empresa;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribuicao extends Model
{
    use HasFactory;
    use Uuids;

    /** Tabela de acesso aos dados */
    protected $table = 'regs_atribuicoes';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Métodos Acessores para o modelo
     */
    //------

    //------
    /**
     * Métodos Mutadores para o modelo
     */


    //------
    /**
     * Relacionamentos com outros modelos
     */

    /**
     * Validação de Dados
     */
    //------

    //-----

}
