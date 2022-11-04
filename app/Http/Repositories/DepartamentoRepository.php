<?php

namespace App\Http\Repositories;

use App\Models\Empresa\Departamento;

class DepartamentoRepository extends BaseRepository
{
    public function __construct(Departamento $model)
    {
        parent::__construct($model);
    }
}
