<?php

namespace App\Observers;

use App\Models\CEO\Normativa;
use App\Models\CEO\Procedimento;
use App\Models\Empresa\Cargo;
use App\Models\Pivot\CargoOcupado;

class CargoObserver
{
    public function deleted(Cargo $cargo)
    {
        // Vamos remover todas as referências existentes em Empresas Cargos Ocupados
        if($cargo->id){
            $ocupacoes = CargoOcupado::where('id_cargo',$cargo->id)->delete();
        }

        // Remover todas as aplicações de normativas
        $normativas = Normativa::where('aplicada_em','LIKE','%_cargo_'.$cargo->id.'%')->get();
        foreach($normativas as $normativa){
            $aplicacoes = json_decode($normativa->aplicada_em);
            // Rodar a array
            foreach($aplicacoes as $index => $aplicacao){
                if($aplicacao == '_cargo_'.$cargo->id."_"){
                    unset($aplicacoes[$index]);
                }
            }
            // Atualizar aplicacoes
            $normativa->aplicada_em = json_encode(array_values($aplicacoes));
            $normativa->save();
        }
        // Remover todas as aplicações de Procedimento
        $procedimentos = Procedimento::where('aplicada_em','LIKE','%_cargo_'.$cargo->id.'%')->get();
        foreach($procedimentos as $procedimento){
            $aplicacoes = json_decode($procedimento->aplicada_em);
            // Rodar a array
            foreach($aplicacoes as $index => $aplicacao){
                if($aplicacao == '_cargo_'.$cargo->id."_"){
                    unset($aplicacoes[$index]);
                }
            }
            // Atualizar aplicacoes
            $procedimento->aplicada_em = json_encode(array_values($aplicacoes));
            $procedimento->save();
        }
    }
}
