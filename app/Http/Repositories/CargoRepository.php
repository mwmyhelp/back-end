<?php

namespace App\Http\Repositories;

use App\Models\Empresa\Cargo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CargoRepository extends BaseRepository
{
    public function __construct(Cargo $model)
    {
        parent::__construct($model);
    }


    function store($request)
    {
        /** Iniciando a construção e validação de modelo de dados **/
        DB::beginTransaction();
        //Criando Cargo
        $cargo = new Cargo();
        //Preenchendo
        $cargo->fill($request->all());
        //Definindo Departamento
        $cargo->id_departamento = $request->route('id_departamento');
        //Definindo Bee Conta
        $cargo->bee_conta = Auth::user()->bee_conta_id;
        //Salvando
        $cargo->save();
        //Executando
        DB::commit();

        return $cargo;
    }

    function update($data, $id_departamento, $id)
    {
        $cargo = Cargo::where('bee_conta', Auth::user()->bee_conta_id)->where('id_departamento', $id_departamento)->where('id', $id)->firstOrFail();
        $cargo->fill($data);
        $cargo->save();
        return $cargo;

    }
}
