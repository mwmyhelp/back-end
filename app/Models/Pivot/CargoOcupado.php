<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoOcupado extends Model
{
    use HasFactory;

    /** Tabela de acesso aos dados */
    protected $table = 'empresa_cargos_ocupados';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que sã];

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
    public function colaborador(){
        return $this->hasOne('App\Models\Empresa\Colaborador','id','id_colaborador');
    }
    public function cargo(){
        return $this->hasOne('App\Models\Empresa\Cargo','id','id_cargo');
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
