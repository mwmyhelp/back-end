<?php

namespace App\Models\CEO;

use App\Models\Empresa\Departamento;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedimento extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'regs_procedimentos';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['titulo', 'emoji', 'gcodigo'];

    /**
     * Métodos Acessores para o modelo
     */
    //------
    public function getTituloAttribute(){
        return $this->beedoc->titulo;
    }
    public function getEmojiAttribute(){
        return $this->beedoc->emoji;
    }
    public function getGcodigoAttribute(){
        return str_pad($this->codigo,3,"0",STR_PAD_LEFT);
    }
    //------
    public function obterDepartamentos(){
        $lista = [];
        if(!is_null($this->departamentos)){
            foreach(json_decode($this->departamentos) as $departamento){
                $achar = Departamento::find($departamento);
                $lista[] = $achar;
            }
        }
        return $lista;
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
    public function beedoc(){
        return $this->hasOne('App\Models\CEO\BeeDoc','id','id_documental');
    }
    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
