<?php

namespace App\Http\Repositories;

use App\Models\Hive\PessoaJuridica;

class PessoaJuridicaRepository extends BaseRepository
{
    public function __construct(PessoaJuridica $model)
    {
        parent::__construct($model);
    }
}
