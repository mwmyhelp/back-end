<?php

namespace App\Http\Repositories;

use App\Models\Hive\BeeEndereco;

class EnderecoRepository extends BaseRepository
{
    public function __construct(BeeEndereco $model)
    {
        parent::__construct($model);
    }

}
