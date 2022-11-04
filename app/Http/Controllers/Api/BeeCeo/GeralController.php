<?php

namespace App\Http\Controllers\Api\BeeCeo;

use App\Http\Controllers\Api\Empresa\Colaboradores;
use App\Http\Controllers\Controller;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\Colaborador;
use App\Models\Empresa\Departamento;
use App\Models\Empresa\Setor;
use Illuminate\Http\Request;
use laravelApiHelpers\ResponseHelper;

class GeralController extends Controller
{

    public function estruturaGeralSemCargos(Request $request)
    {
        /** Montar uma estrutura geral do sistema, sem cargos **/
        //Em um futuro beeem próximo, tem que verificar se alguns papeis estão disponíveis ou não
        /** Primeiro vamos obter a estrutura geral de departamentos **/
        $departamentos = Departamento::where('bee_conta', \Auth::user()->bee_conta)->whereNull('id_pai')->with('filhos')->get();
        /** Com a estrutura inteira de departamentos, vamos percorrer toda ela buscando por cargos a serem ocupados **/
        $estrutura = $this->analisarSemCargo($departamentos);
        array_unshift($estrutura, [
            'id' => '_geral_',
            'label' => '🏢 Geral'
        ]);
        //Retornar a estrutura
        return ResponseHelper::sucessoObter($estrutura);
    }

    public function estruturaGeralComCargos(Request $request)
    {
        set_time_limit(0);
        /** Montar uma estrutura geral do sistema, com cargos **/
        //Em um futuro beeem próximo, tem que verificar se alguns papeis estão disponíveis ou não
        /** Primeiro vamos obter a estrutura geral de departamentos **/
        $departamentos = Departamento::where('bee_conta', \Auth::user()->bee_conta)->whereNull('id_pai')->with('filhos')->get();
        /** Com a estrutura inteira de departamentos, vamos percorrer toda ela buscando por cargos a serem ocupados **/
        $estrutura = $this->analisarComCargo($departamentos);
        array_unshift($estrutura, [
            'id' => '_geral_',
            'label' => '🏢 Geral'
        ]);
        //Retornar a estrutura
        return ResponseHelper::sucessoObter($estrutura);
    }

    public function estruturaPapeis(Request $request)
    {
        /** Montar uma estrutura de Papeis **/
        //Em um futuro beeem próximo, tem que verificar se alguns papeis estão disponíveis ou não
        /** Primeiro vamos obter a estrutura geral de departamentos **/
        $departamentos = Departamento::where('bee_conta', \Auth::user()->bee_conta)->whereNull('id_pai')->with('filhos')->get();
        /** Com a estrutura inteira de departamentos, vamos percorrer toda ela buscando por cargos a serem ocupados **/
        $estrutura = $this->analisarPapeis($departamentos);
        //Retornar a estrutura
        return ResponseHelper::sucessoObter($estrutura);
    }

    public function estruturaColaboradores(Request $request)
    {
        /** Retorna a estrutura com todos os colaboradores da empresa **/
        $colaboradores = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->get();
        $geral = array();
        //Montando estrutura
        foreach ($colaboradores as $colaborador) {

            if ($colaborador->tipo_acesso == 'beelider') {
                $estrutura = [
                    'id' => $colaborador->id,
                    'label' => '🐝 ' . $colaborador->nome . " " . $colaborador->sobrenome
                ];
            } else if ($colaborador->tipo_acesso == 'gestor') {
                $estrutura = [
                    'id' => $colaborador->id,
                    'label' => '👨🏽‍💼 ' . $colaborador->nome . " " . $colaborador->sobrenome
                ];
            } else {
                $estrutura = [
                    'id' => $colaborador->id,
                    'label' => '🙎🏽‍♂️' . $colaborador->nome . " " . $colaborador->sobrenome
                ];
            }
            $geral[] = $estrutura;
        }
        return ResponseHelper::sucessoObter($geral);
    }

    protected function analisarPapeis($departamentos)
    {
        //Recebe um departamento, e devolve ele com a sua estrutura de papéis
        $geral = [];
        foreach ($departamentos as $analise) {
            $cargos = 0;
            //Estrutura do Departamento
            $estrutura = [
                'id' => '_dep_' . $analise->id . '_',
                'label' => '💼 ' . $analise->titulo
            ];
            //Analisando Filhos (Subdepartamentos)
            if (count($analise->filhos)) {
                $estrutura['children'] = $this->analisarPapeis($analise->filhos);
                //Analisar cada Childern
                foreach ($estrutura['children'] as $filho) {
                    //Somar numero de cargos
                    $cargos += $filho['total_cargos'];
                }
            }
            //Analisando Cargos
            if (count($analise->cargos)) {
                foreach ($analise->cargos as $cargo) {
                    $cargos++;
                    if ($cargo->permissao == 'lider') {
                        $estrutura['children'][] = [
                            'id' => '_cargo_' . $cargo->id . "_",
                            'label' => '🗣 ' . $cargo->titulo
                        ];
                    } else if ($cargo->permissao == 'coordenador') {
                        $estrutura['children'][] = [
                            'id' => '_cargo_' . $cargo->id . "_",
                            'label' => '👨🏽‍🏫 ' . $cargo->titulo
                        ];
                    } else {
                        $estrutura['children'][] = [
                            'id' => '_cargo_' . $cargo->id . "_",
                            'label' => '👷 ' . $cargo->titulo
                        ];
                    }
                }
            }
            //Se não tiver cargos, não tem o que retornar
            if ($cargos >= 1) {
                //Somatoria de cargos
                $estrutura['total_cargos'] = $cargos;
                $geral[] = $estrutura;
            }
        }
        //Retornando
        return $geral;
    }

    protected function analisarSemCargo($departamentos)
    {
        //Recebe um departamento, e devolve ele com a sua estrutura de papéis
        $geral = [];
        foreach ($departamentos as $analise) {
            //Estrutura do Departamento
            $estrutura = [
                'id' => '_dep_' . $analise->id . '_',
                'label' => '💼 ' . $analise->titulo
            ];
            //Analisando Filhos (Subdepartamentos)
            if (count($analise->filhos)) {
                $estrutura['children'] = $this->analisarSemCargo($analise->filhos);
            }
            //Analisando Setores
            if (count($analise->setores)) {
                foreach ($analise->setores as $setor) {
                    $estrutura['children'][] = [
                        'id' => '_setor_' . $setor->id . "_",
                        'label' => '📁 ' . $setor->titulo
                    ];
                }
            }
            $geral[] = $estrutura;
        }
        //Retornando
        return $geral;
    }

    protected function analisarComCargo($departamentos)
    {
        //Recebe um departamento, e devolve ele com a sua estrutura de papéis
        $geral = [];
        foreach ($departamentos as $analise) {
            //Estrutura do Departamento
            if($analise->id == '0c908e07-82f6-4630-bf96-5f8d36e399d4'){
                foreach($analise->filhos as $teste){
                    //dd($teste->titulo, count($teste->cargos), $teste->cargos);
                }
            }
            $estrutura = [
                'id' => '_dep_' . $analise->id . '_',
                'label' => '💼 ' . $analise->titulo
            ];
            //Analisando Filhos (Subdepartamentos)
            if (count($analise->filhos)) {
                $estrutura['children'] = $this->analisarComCargo($analise->filhos);
            }
            //Analisando Setores
            if (count($analise->setores)) {
                foreach ($analise->setores as $setor) {
                    $estrutura['children'][] = [
                        'id' => '_setor_' . $setor->id . "_",
                        'label' => '📁 ' . $setor->titulo
                    ];
                }
            }
            //Analisando Cargos
            if (count($analise->cargos)) {
                foreach ($analise->cargos as $cargo) {
                    $estrutura['children'][] = [
                        'id' => '_cargo_' . $cargo->id . "_",
                        'label' => '👷 ' . $cargo->titulo
                    ];
                }
            }
            $geral[] = $estrutura;
        }
        //Retornando
        return $geral;
    }
}
