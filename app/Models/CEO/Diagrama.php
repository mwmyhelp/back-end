<?php

namespace App\Models\CEO;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagrama extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'regs_diagramas';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['gcodigo'];
    /**
     * Métodos Acessores para o modelo
     */

    /**
     * Métodos Mutadores para o modelo
     */
    public function getGcodigoAttribute(){
        return str_pad($this->cod,3,'0',STR_PAD_LEFT);
    }
    /**
     * Relacionamentos com outros modelos
     */

    /**
     * Validação de Dados
     */


}
