<?php

namespace App\Models\Empresa;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use laravelApiHelpers\FormatHelper;

class Colaborador extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'empresa_colaboradores';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['nome','sobrenome','cpf'];

    /**
     * Métodos Acessores para o modelo
     */
    //------
    public function getNomeAttribute(){
        return $this->pessoaFisica->nome;
    }
    public function getSobrenomeAttribute(){
        return $this->pessoaFisica->sobrenome;
    }
    public function getCpfAttribute(){
        return FormatHelper::mascarar($this->usuario->cpf,"###.###.###-##");
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
    public function pessoaFisica(){
        return $this->hasOne('App\Models\Hive\PessoaFisica','id','id_pessoa_fisica');
    }
    public function usuario(){
        return $this->hasOne('App\Models\User','id','id_usuario');
    }
    public function cargos(){
        return $this->hasMany('App\Models\Pivot\CargoOcupado','id_colaborador','id');
    }
    public function beedoc(){
        return $this->hasOne('App\Models\CEO\BeeDoc','id','id_documental');
    }
    public function chefe(){
        return $this->hasOne('App\Models\Empresa\Colaborador','id','chefia_imediata');
    }
    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
