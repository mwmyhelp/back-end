<?php

namespace App\Models\Hive;

use App\Traits\Uuids;
use App\Traits\Validation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use laravelApiHelpers\FormatHelper;

class PessoaFisica extends Model
{
    use Uuids;
    use HasFactory;

    /** Tabela de acesso aos dados */
    protected $table = 'bee_pessoas_fisica';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['nome', 'sobrenome', 'cpf', 'nascimento', 'telefone_celular', 'email', 'id_endereco'];

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
    public function getDocumentoAttribute(){
        return $this->attributes['cpf'];
    }
    //------
    /**
     * Métodos Mutadores para o modelo
     */
    //------
    public function setCpfAttribute($cpf){
        $this->attributes['cpf'] = FormatHelper::apenasNumeros($cpf);
    }
    //------
    /**
     * Relacionamentos com outros modelos
     */
    //------

    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
