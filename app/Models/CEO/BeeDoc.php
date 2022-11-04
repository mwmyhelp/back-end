<?php

namespace App\Models\CEO;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeeDoc extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    /** Tabela de acesso aos dados */
    protected $table = 'bee_doc';

    /** Atributos que podem ser definidos em massa **/
    protected $fillable = [];

    /** Atributos que não são exibidos na saidas em JSON */
    protected $hidden = [];

    /** Atributos que são forçados a serem convertidos para seus devidos tipos */
    protected $casts = [];

    /** Atributos que são forçados a serem tratados como datas */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Métodos Acessores para o modelo
     */

    /**
     * Métodos Mutadores para o modelo
     */

    /**
     * Relacionamentos com outros modelos
     */
    public function autor(){
        return $this->hasOne('App\Models\User','id','created_by');
    }
    /**
     * Validação de Dados
     */


}
