<?php

namespace App\Http\Repositories;

use App\Models\Hive\PessoaFisica;

class PessoaFisicaRepository extends BaseRepository
{
    public function __construct(PessoaFisica $model)
    {
        parent::__construct($model);
    }
}
