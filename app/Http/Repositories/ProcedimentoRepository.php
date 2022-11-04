<?php

namespace App\Http\Repositories;

use App\Models\CEO\Procedimento;

class ProcedimentoRepository extends BaseRepository
{
    public function __construct(Procedimento $model)
    {
        parent::__construct($model);
    }
}
