<?php

namespace App\Http\Repositories;

use App\Models\CEO\Normativa;

class NormativaRepository extends BaseRepository
{
    public function __construct(Normativa $model)
    {
        parent::__construct($model);
    }
}
