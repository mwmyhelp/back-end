<?php

namespace App\Models\Empresa;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'empresa_cargos';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = ['created_at', 'updated_at', 'deleted_at', 'id_departamento'];

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
    public function getTituloAttribute(){
        return $this->beedoc->titulo;
    }
    public function getEmojiAttribute(){
        return $this->beedoc->emoji;
    }
    public function getTrilhaAscAttribute(){
        return $this->departamento->trilhaAsc;
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
    public function departamento(){
        return $this->hasOne('App\Models\Empresa\Departamento','id','id_departamento');
    }

    public function setor(){
        return $this->hasOne('App\Models\Empresa\Setor','id','id_setor');
    }

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
