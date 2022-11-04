<?php

namespace App\Http\Repositories;

use App\Models\Pivot\CargoOcupado;

class CargoOcupadoRepository extends BaseRepository
{
    public function __construct(CargoOcupado $model)
    {
        parent::__construct($model);
    }
}
