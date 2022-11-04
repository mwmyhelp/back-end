<?php

namespace App\Http\Controllers\Api\Empresa;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\CargoRepository;
use App\Http\Requests\CargoRequest;
use App\Models\CEO\BeeDoc;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\Departamento;
use App\Models\Empresa\Setor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use laravelApiHelpers\ResponseHelper;

class Cargos extends Controller
{
    protected $repository;

   // public function __construct(CargoRepository $atribuicaoRepository)
   // {
      //  $this->repository = $atribuicaoRepository;
   // }

    /** ↓↓↓ Nova Estrutura */
    public function listar(Request $request, $id_departamento)
    {
        /** Validar Departamento **/
        \Validator::validate([
                'id_departamento' => $id_departamento
            ] + $request->all(), [
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);
        $cargos = Cargo::where('id_departamento',$id_departamento)->where('bee_conta',Auth::user()->bee_conta)->get();
        //Retornando
        return ResponseHelper::sucessoObter($cargos, [], "car_04", "Cargos obtidos com sucesso.");
    }

    /** ↓↓↓ Nova Estrutura */
    public function criar(Request $request, $id_departamento)
    {
        /** Validação */
        \Validator::validate([
                'id_departamento' => $id_departamento
            ] + $request->all(), [
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id',
            'titulo' => 'required'
        ]);
        //Iniciando Transação
        \DB::beginTransaction();
        try {
            /** Contruindo o Documento Referente */
            $doc = new BeeDoc();
            //Quem criou?
            $doc->created_by = \Auth::id();
            //Qual a Bee Conta?
            $doc->bee_conta = \Auth::user()->bee_conta;
            //Qual tipo do documento?
            $doc->tipo = 'atribuicao_cargo';
            //Qual o título do documento?
            $doc->titulo = $request->input('titulo');
            //Status - Como é um cargo, já vai estar ativo.
            $doc->status = 'A';
            /**
             * URL Capa -> Vazio
             * Emoji -> Vazio
             * Conteúdo Publicado e Conteúdo em Edição -> Vazio
             */
            //Salvando o Doc
            $doc->save();
            /** Construindo o Cargo */
            $cargo = new Cargo();
            //Preenchendo
            $cargo->bee_conta = \Illuminate\Support\Facades\Auth::user()->bee_conta;
            $cargo->id_departamento = $id_departamento;
            $cargo->id_documental = $doc->id;
            //Salvando
            $cargo->save();
            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Cargo criado com sucesso", $cargo, "set_02");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** ↓↓↓ Nova Estrutura */
    public function obter(Request $request, $id_departamento, $id_cargo)
    {
        /** Validar **/
        \Validator::validate(
            [
                'id_cargo' => $id_cargo,
                'id_departamento' => $id_departamento
            ], [
            'id_cargo' => 'required|string|size:36|exists:empresa_cargos,id',
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);
        /** Obter um cargo **/
        $cargo = Cargo::where('id_departamento', $id_departamento)->where('id', $id_cargo)->where('bee_conta', \Illuminate\Support\Facades\Auth::user()->bee_conta)->firstOrFail();
        $cargo->append('trilhaAsc');
        $cargo->makeHidden('departamento');
        $cargo->load('setor');
        //Retornando
        return ResponseHelper::sucessoObter($cargo, [], "set_04", "Cargo obtido com sucesso.");
    }

    /** ↓↓↓ Nova Função **/
    public function definirTipo(Request $request, $id_departamento, $id_cargo){
        /** Validar **/
        \Validator::validate(
            [
                'id_cargo' => $id_cargo,
                'id_departamento' => $id_departamento
            ], [
            'id_cargo' => 'required|string|size:36|exists:empresa_cargos,id',
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);
        /** Obter um cargo **/
        $cargo = Cargo::where('id_departamento', $id_departamento)->where('id', $id_cargo)->where('bee_conta', \Illuminate\Support\Facades\Auth::user()->bee_conta)->firstOrFail();
        //Subtituir permissão
        $cargo->permissao = $request->input('tipo');
        //Salvar
        $cargo->save();
        //Retornando
        return ResponseHelper::sucessoAcao("Tipo alterado com sucesso", $cargo);
    }

    /** ↓↓↓ Nova Função **/
    public function definirSetor(Request $request, $id_departamento, $id_cargo){
        /** Validar **/
        \Validator::validate(
            [
                'id_cargo' => $id_cargo,
                'id_departamento' => $id_departamento
            ], [
            'id_cargo' => 'required|string|size:36|exists:empresa_cargos,id',
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);
        /** Obter um cargo **/
        $cargo = Cargo::where('id_departamento', $id_departamento)->where('id', $id_cargo)->where('bee_conta', \Illuminate\Support\Facades\Auth::user()->bee_conta)->firstOrFail();
        //Subtituir permissão
        $cargo->id_setor = ($request->input('id_setor') == 'nenhum') ? null : $request->input('id_setor');
        //Salvar
        $cargo->save();
        //Retornando
        return ResponseHelper::sucessoAcao("Setor definido com sucesso.", $cargo->load('setor'));
    }



}
