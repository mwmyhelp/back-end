<?php

namespace App\Models\Hive;

use App\Traits\Uuids;
use App\Traits\Validation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use laravelApiHelpers\FormatHelper;

class PessoaJuridica extends Model
{
    use Uuids;
    use HasFactory;
    /** Validação de modelo **/
    use Validation;
    protected $regras = [
        'razao_social' => 'required|string|max:250',
        'nome_fantasia' => 'required|string|max:200',
        'cnpj' => 'required|numeric|digits:14'
    ];

    /** Tabela de acesso aos dados */
    protected $table = 'bee_pessoas_juridica';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['cnpj', 'telefone_fixo', 'telefone_celular', 'email', 'website', 'razao_social', 'nome_fantasia', 'id_endereco'];

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
        return $this->attributes['cnpj'];
    }
    public function getNomeAttribute(){
        return $this->attributes['nome_fantasia'];
    }
    //------
    /**
     * Métodos Mutadores para o modelo
     */
    //------
    public function setCnpjAttribute($cnpj){
        $this->attributes['cnpj'] = FormatHelper::apenasNumeros($cnpj);
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
