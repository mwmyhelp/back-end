<?php

namespace App\Models\Hive;

use App\Traits\Uuids;
use App\Traits\Validation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use laravelApiHelpers\FormatHelper;

class BeeConta extends Model
{
    use Uuids;
    use HasFactory;
    use SoftDeletes;
    /** Validação de modelo **/
    use Validation;
    protected $regras = [
        'pessoa_id' => 'required',
        'pessoa_type' => 'required|string|max:100',
        'telefone_principal' => 'required|numeric|digits_between:9,11',
        'telefone_adicional' => 'sometimes|nullable|numeric|digits_between:9,11',
        'email_principal' => 'required|email',
        'email_adicional' => 'sometimes|nullable|email',
        'imagem_perfil' => 'sometimes|nullable|string|max:200',
        'website' => 'sometimes|nullable|url',
        'bee_conta' => 'required|string|max:250',
        'id_usuario' => 'required|exists:users,id',
        'situacao' => 'required|in:A,I,X,E,D',
        'id_endereco' => 'required|exists:bee_enderecos,id'
    ];

    /** Método Validar é Personalizado aqui */
    public function validarAvancado()
    {
        /** Vamos fazer outras verificações */
        if(!$this->validar()){
            return false;
        }
        //Validando a classe
        if(!class_exists($this->pessoa_type)){
            $this->erros = [
                'pessoa_type' => 'Classe inexistente'
            ];
            return false;
        }
        //Validando a Existencia do Objeto
        $pessoa = new $this->pessoa_type;
        if(!$pessoa->where('id',$this->pessoa_id)->first()) {
            $this->erros = [
                'pessoa_id' => 'A pessoa solicitada não existe'
            ];
            return false;
        }
        //Tudo OK
        return true;
    }

    /** Tabela de acesso aos dados */
    protected $table = 'bee_contas';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['pessoa_type', 'pessoa_id', 'imagem_perfil', 'id_responsavel', 'id_usuario', 'telefone_principal',
        'telefone_adicional', 'email_principal', 'email_adicional', 'website', 'situacao', 'configuracoes'];

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
    public function getImagemPerfilAttribute(){
        if(is_null($this->attributes['imagem_perfil'])){
            return 'avatar/avatar_padrao.jpg';
        }else{
            return $this->attributes['imagem_perfil'];
        }
    }
    //------
    public function setTelefonePrincipalAttribute($telefone){
        $this->attributes['telefone_principal'] = FormatHelper::apenasNumeros($telefone);
    }
    public function setTelefoneAdicionalAttribute($telefone){
        $this->attributes['telefone_adicional'] = FormatHelper::apenasNumeros($telefone);
    }
    public function setWebsiteAttribute($website){
        $this->attributes['website'] = FormatHelper::formatarUrl($website);
    }

    //------
    /**
     * Relacionamentos com outros modelos
     */
    //------
    public function pessoa(){
            return $this->morphTo();
    }
    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
