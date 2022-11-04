<?php

namespace App\Observers;

use App\Models\CEO\Normativa;
use App\Models\CEO\Procedimento;
use App\Models\Empresa\Departamento;

class DepartamentoObserver
{
    public function deleted(Departamento $departamento)
    {
        // Vamos deletar todos os cargos desse departamento
        foreach($departamento->cargos as $cargo){
            $cargo->delete();
        }
        // Vamos deletar todas as referências desse departamento
        // Remover todas as aplicações de normativas
        $normativas = Normativa::where('aplicada_em','LIKE','%_dep_'.$departamento->id.'%')->get();
        foreach($normativas as $normativa){
            $aplicacoes = json_decode($normativa->aplicada_em);
            // Rodar a array
            foreach($aplicacoes as $index => $aplicacao){
                if($aplicacao == '_dep_'.$departamento->id."_"){
                    unset($aplicacoes[$index]);
                }
            }
            // Atualizar aplicacoes
            $normativa->aplicada_em = json_encode(array_values($aplicacoes));
            $normativa->save();
        }
        // Remover todas as aplicações de Procedimento
        $procedimentos = Procedimento::where('aplicada_em','LIKE','%_dep_'.$departamento->id.'%')->get();
        foreach($procedimentos as $procedimento){
            $aplicacoes = json_decode($procedimento->aplicada_em);
            // Rodar a array
            foreach($aplicacoes as $index => $aplicacao){
                if($aplicacao == '_dep_'.$departamento->id."_"){
                    unset($aplicacoes[$index]);
                }
            }
            // Atualizar aplicacoes
            $procedimento->aplicada_em = json_encode(array_values($aplicacoes));
            $procedimento->save();
        }
        // Procurar por filhos e remover eles
        foreach($departamento->filhos as $filho){
            $filho->delete();
        }
    }
}
