<?php

namespace App\Http\Controllers\Api\Empresa;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\DepartamentoRepository;
use App\Http\Requests\CriarDepartamentoRequest;
use App\Models\CEO\BeeDoc;
use App\Models\Empresa\Colaborador;
use App\Models\Empresa\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use laravelApiHelpers\ResponseHelper;

class Departamentos extends Controller
{
    protected $repository;

    public function __construct(DepartamentoRepository $atribuicaoRepository)
    {
        $this->repository = $atribuicaoRepository;
    }

    /** Nova Estrutura ↓↓↓ */
    public function criar(CriarDepartamentoRequest $request)
    {
        /** Quando criamos um departamento, simplesmente informamos o nome dele, o restante é automático **/
        //Iniciar Transação
        \DB::beginTransaction();
        try {
            /** Contruindo o Documento Referente */
            $doc = new BeeDoc();
            //Preenchendo os dados (*Fernando faz a mágica dele depois se necessário kkkk)
            //Quem criou?
            $doc->created_by = \Auth::id();
            //Qual a Bee Conta?
            $doc->bee_conta = \Auth::user()->bee_conta;
            //Qual tipo do documento?
            $doc->tipo = 'departamento';
            //Qual o título do documento?
            $doc->titulo = $request->input('titulo');
            //Status - Como é um departamento, já vai estar ativo.
            $doc->status = 'A';
            /**
             * URL Capa -> Vazio
             * Emoji -> Vazio
             * Conteúdo Publicado e Conteúdo em Edição -> Vazio
             */
            //Salvando o Doc
            $doc->save();
            /** Construindo o Departamento */
            $departamento = new Departamento();
            //Preenchendo os dados
            //Qual a bee conta?
            $departamento->bee_conta = \Auth::user()->bee_conta;
            //Qual o documento referencia
            $departamento->id_documental = $doc->id;
            //Possui um pai?
            $departamento->id_pai = $request->input('id_pai',null);
            /**
             * Líder -> Não informado
             * Coordenador -> Não informado
             */
            //Salvando o o departamento
            $departamento->save();
            //Commit no BD
            \DB::commit();
            //Retornando o resultado
            return ResponseHelper::sucessoAcao("Departamento criado com sucesso.", $departamento);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** Nova Estrutura ↓↓↓ */
    public function listar(Request $request)
    {
        /** Listando os departamentos da beeConta **/
        switch ($request->get('modelo')) {
            case "arvore" :
                //Exibe todos os departamentos e subdepartamentos a partir da raiz
                $lista = Departamento::where('bee_conta', \Auth::user()->bee_conta)->whereNull('id_pai')->with('filhos')->get();
                $filtro = ['exibir' => 'completo'];
                break;

            case "removidos" :
                $lista = Departamento::where('bee_conta', \Auth::user()->bee_conta)->onlyTrashed()->whereNull('id_pai')->get();
                $filtro = ['exibir' => 'removidos'];
                break;

            default:
                $lista = Departamento::where('bee_conta', \Auth::user()->bee_conta)->whereNull('id_pai')->get();
                $filtro = [];
                break;
        }

        return ResponseHelper::sucessoObter($lista, $filtro, "dep_02", "Departamentos obtidos com sucesso");

    }

    /** Nova Ação ↓↓↓ */
    public function renomear(Request $request, $id_departamento){
        /** Função para renomerar um específico departamento **/
        //Validando
        \Validator::validate(
            ['id' => $id_departamento] + $request->all(),
            [
                'id' => 'required|string|size:36|exists:empresa_departamentos,id',
                'titulo' => [
                    'required',
                    'string',
                    'max:100'
                ]
            ]
        );
        //Iniciando transação
        \DB::beginTransaction();
        try {
            //Obter o departamento
            $departamento = Departamento::where('id',$id_departamento)->where('bee_conta',\Auth::user()->bee_conta)->firstOrFail();
            //Renomeando
            $departamento->beedoc->titulo = $request->input('titulo');
            //Salvando
            $departamento->beedoc->save();
            //Commitando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Departamento renomeado com sucesso.", $departamento);

        }catch (\Exception $exception){
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** Nova Ação ↓↓↓ */
    public function arquivar(Request $request, $id_departamento)
    {
        /** Remover um departamento específico **/
        //Validar
        \Validator::validate(['id' => $id_departamento], ['id' => 'required|string|size:36|exists:empresa_departamentos,id']);
        //Transação
        \DB::beginTransaction();
        //Remover
        try {
            //Obter departamento
            $departamento = Departamento::where('id',$id_departamento)->where('bee_conta',\Auth::user()->bee_conta)->firstOrFail();

            //TODO (DESATIVAR TODOS OS FILHOS)

            //Seguir remoção
            $departamento->delete();

            //TODO::Melhorar Validação

            //Comit
            \DB::commit();

            return ResponseHelper::sucessoAcao("Departamento Arquivado", [], "dep_05");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    /** Nova Estrutura ↓↓↓ */
    public function obter(Request $request, $id_departamento)
    {
        /** Obter informações de um departamento específico **/
        //Validar
        \Validator::validate(['id' => $id_departamento], ['id' => 'required|string|size:36|exists:empresa_departamentos,id']);
        //Obter
        $departamento = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_departamento)->firstOrFail();
        $departamento->append('trilhaAsc');
        $departamento->append('trilhaDesc');
        return ResponseHelper::sucessoObter($departamento, [], "dep_02", "Departamento obtido com sucesso");

    }

    public function salvar(Request $request, $id_departamento)
    {
        /** Validar Request **/
        \Validator::validate($request->all() + ['id' => $id_departamento], [
            'id_pai' => 'sometimes|nullable|string|size:36|exists:empresa_departamentos,id',
            'id' => 'required|string|size:36|exists:empresa_departamentos,id',
            'nome' => [
                'required',
                'string',
                'max:200',
                Rule::unique('empresa_departamentos')->where(function ($query) use ($request, $id_departamento) {
                    //Unico nome, exceto o ID atual
                    $query->where('nome', $request->input('nome'))->where('id', '!=', $id_departamento);

                    if ($request->input('id_pai')) {
                        return $query->where('id_pai', $request->input('id_pai'))->where('bee_conta', \Auth::user()->bee_conta);
                    } else {
                        return $query->where('id_pai', $request->input(0))->where('bee_conta', \Auth::user()->bee_conta);
                    }
                })
            ],
            'descricao' => 'sometimes|nullable|string|max:250',
            'atribuicoes' => 'sometimes|nullable|string',
            'icone' => [
                'sometimes',
                'nullable'
            ],
            'cor' => 'sometimes|nullable|regex:#[a-zA-Z0-9]{6}#'
        ]);
        //Iniciar Transação
        \DB::beginTransaction();
        try {
            //Construir o departamento
            $departamento = Departamento::findOrFail($id_departamento);
            //Preencher
            $departamento->fill($request->except(['id_pai']));
            //Salvando o o departamento
            $departamento->save();
            //Commit no BD
            \DB::commit();
            //Retornando o resultado
            return ResponseHelper::sucessoAcao("Departamento salvo com sucesso.", $departamento, "dep_04");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function remover(Request $request, $id_departamento)
    {
        /** Remover um departamento específico **/
        //Validar
        \Validator::validate(['id' => $id_departamento], ['id' => 'required|string|size:36|exists:empresa_departamentos,id']);
        //Remover
        try {
            $departamento = Departamento::findOrFail($id_departamento);
            $departamento->delete();
            //TODO::Melhorar Validação
            return ResponseHelper::sucessoAcao("Departamento Removido", [], "dep_05");
        } catch (\Exception $exception) {
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function definirLider(Request $request, $id_departamento)
    {
        /** Obter informações de um departamento específico **/
        //Validar
        \Validator::validate($request->all() + ['id' => $id_departamento],
            [
                'id' => 'required|string|size:36|exists:empresa_departamentos,id',
                'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
            ]
        );
        //Obter
        $departamento = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_departamento)->firstOrFail();
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $request->input('id_colaborador'))->firstOrFail();
        //Definindo Lider
        $departamento->id_lider = $colaborador->id;
        $departamento->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Lider Definido", $colaborador->load(['pessoaFisica', 'usuario']), 'dep_07');

    }

    public function removerLider(Request $request, $id_departamento)
    {
        /** Remvoer Líder do Departamento **/
        //Validar
        \Validator::validate(['id' => $id_departamento],
            [
                'id' => 'required|string|size:36|exists:empresa_departamentos,id'
            ]
        );
        //Obter
        $departamento = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_departamento)->firstOrFail();
        //Definindo Lider
        $departamento->id_lider = null;
        $departamento->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Lider Removido", 'dep_08');

    }

    public function definirCoordenador(Request $request, $id_departamento)
    {
        /** Obter informações de um departamento específico **/
        //Validar
        \Validator::validate($request->all() + ['id' => $id_departamento],
            [
                'id' => 'required|string|size:36|exists:empresa_departamentos,id',
                'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
            ]
        );
        //Obter
        $departamento = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_departamento)->firstOrFail();
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $request->input('id_colaborador'))->firstOrFail();
        //Definindo Coordenador
        $departamento->id_coordenador = $colaborador->id;
        $departamento->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Coordenador Definido", $colaborador->load(['pessoaFisica', 'usuario']), 'dep_08');
    }

    public function removerCoordenador(Request $request, $id_departamento)
    {
        /** Remvoer Líder do Departamento **/
        //Validar
        \Validator::validate(['id' => $id_departamento],
            [
                'id' => 'required|string|size:36|exists:empresa_departamentos,id'
            ]
        );
        //Obter
        $departamento = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_departamento)->firstOrFail();
        //Definindo Lider
        $departamento->id_coordenador = null;
        $departamento->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Coordenador Removido", 'dep_08');

    }


}
