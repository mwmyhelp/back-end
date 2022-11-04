<?php

namespace App\Http\Repositories;

use App\Models\Empresa\Setor;

class SetorRepository extends BaseRepository
{
    public function __construct(Setor $model)
    {
        parent::__construct($model);
    }
}
