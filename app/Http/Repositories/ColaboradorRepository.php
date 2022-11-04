<?php

namespace App\Http\Repositories;

use App\Models\Empresa\Colaborador;

class ColaboradorRepository extends BaseRepository
{
    public function __construct(Colaborador $model)
    {
        parent::__construct($model);
    }
}
