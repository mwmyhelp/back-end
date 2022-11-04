<?php

namespace App\Models\Empresa;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Departamento extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'empresa_departamentos';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['created_at', 'updated_at', 'deleted_at'];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = ['bee_conta','beedoc'];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['titulo', 'emoji'];

    /**
     * Métodos Acessores para o modelo
     */
    //------

    //------
    /**
     * Métodos Mutadores para o modelo
     */
    //------
    public function getTituloAttribute(){
        return $this->beedoc->titulo;
    }
    public function getEmojiAttribute(){
        return $this->beedoc->emoji;
    }
    public function getTrilhaAscAttribute(){
        return array_reverse($this->pais());
    }
    public function getTrilhaDescAttribute(){
        return $this->filhos->pluck('titulo','id');
    }
    //------
    /**
     * Relacionamentos com outros modelos
     */
    //------
    public function pai(){
        return $this->hasOne('App\Models\Empresa\Departamento','id','id_pai');
    }

    public function pais(){
        //Obtem o Pai
        $pai = $this->hasOne('App\Models\Empresa\Departamento','id','id_pai')->first();
        //Verifica se existe pai
        if($pai){
            return [$this->id => $this->titulo] + $pai->pais();
        }else{
            return [$this->id => $this->titulo];
        }
    }

    public function filhos(){
        if(request()->has('modelo') && request()->input('modelo') == 'arvore'){
            //Retornando filhos com filhos
            return $this->hasMany('App\Models\Empresa\Departamento','id_pai','id')->with('filhos');
        }

        //Retornando apenas os filhos
        return $this->hasMany('App\Models\Empresa\Departamento','id_pai','id');
    }

    public function beedoc(){
        return $this->hasOne('App\Models\CEO\BeeDoc','id','id_documental');
    }

    public function cargos(){
        return $this->hasMany('App\Models\Empresa\Cargo','id_departamento','id');
    }

    public function setores(){
        return $this->hasMany('App\Models\Empresa\Setor','id_departamento','id');
    }

    //------
    /**
     * Validação de Dados
     */
    //------

    //-----

}
