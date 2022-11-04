<?php

namespace App\Http\Controllers\Api\Empresa;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\SetorRepository;
use App\Http\Requests\SetorRequest;
use App\Models\CEO\BeeDoc;
use App\Models\Empresa\Departamento;
use App\Models\Empresa\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use laravelApiHelpers\ResponseHelper;

class Setores extends Controller
{
    protected $repository;

    public function __construct(SetorRepository $atribuicaoRepository)
    {
        $this->repository = $atribuicaoRepository;
    }

    /** ↓↓ Nova Estrutura **/
    public function listar(Request $request, $id_departamento)
    {
        /** Validar Departamento **/
        \Validator::validate([
                'id_departamento' => $id_departamento
            ] + $request->all(), [
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);

        /** Obter Setores deste departamento */
        $setores = Setor::where('id_departamento', $id_departamento)->where('bee_conta', Auth::user()->bee_conta)->get();
        //Retornando
        return ResponseHelper::sucessoObter($setores, [], "set_03", "Setores obtidos com sucesso.");
    }

    /** ↓↓↓ Nova Estrutura **/
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
            //Preenchendo os dados (*Fernando faz a mágica dele depois se necessário kkkk)
            //Quem criou?
            $doc->created_by = \Auth::id();
            //Qual a Bee Conta?
            $doc->bee_conta = \Auth::user()->bee_conta;
            //Qual tipo do documento?
            $doc->tipo = 'atribuicao_setor';
            //Qual o título do documento?
            $doc->titulo = $request->input('titulo');
            //Status - Como é um setor, já vai estar ativo.
            $doc->status = 'A';
            /**
             * URL Capa -> Vazio
             * Emoji -> Vazio
             * Conteúdo Publicado e Conteúdo em Edição -> Vazio
             */
            //Salvando o Doc
            $doc->save();
            /** Construindo o Setor */
            $setor = new Setor();
            //Preenchendo
            $setor->bee_conta = Auth::user()->bee_conta;
            $setor->id_departamento = $id_departamento;
            $setor->id_documental = $doc->id;
            /**
             * Líder é definido depois.
             */
            //Salvando
            $setor->save();
            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Setor criado com sucesso", $setor, "set_02");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** ↓↓↓ Nova Estrutura */
    public function obter(Request $request, $id_departamento, $id_setor)
    {
        /** Validar **/
        \Validator::validate(
            [
                'id_setor' => $id_setor,
                'id_departamento' => $id_departamento
            ], [
            'id_setor' => 'required|string|size:36|exists:empresa_setores,id',
            'id_departamento' => 'required|string|size:36|exists:empresa_departamentos,id'
        ]);
        /** Obter um setor **/
        $setor = Setor::where('id_departamento', $id_departamento)->where('id', $id_setor)->where('bee_conta',Auth::user()->bee_conta)->firstOrFail();
        $setor->append('trilhaAsc');
        $setor->makeHidden('departamento');
        //Retornando
        return ResponseHelper::sucessoObter($setor, [], "set_04", "Setor obtido com sucesso.");
    }

    public function salvar(Request $request, $id_departamento, $id_setor)
    {
        /** Bloqueio do Request **/
        $block = $this->bloquearRequest($request);
        if ($block) {
            return $block;
        }
        /** Validando **/
        \Validator::validate($request->all(), [
            'nome' => [
                'required',
                'string',
                'max:200',
                Rule::unique('empresa_setores')->where(function ($query) use ($request, $id_departamento, $id_setor) {
                    //Unico nome
                    $query->where('nome', $request->input('nome'))->where('id', '!=', $id_setor);
                    return $query->where('id_departamento', $id_departamento);
                })
            ],
            'descricao_curta' => 'sometimes|nullable|string|max:250',
            'icone' => [
                'sometimes',
                'nullable',
                Rule::in(array_keys(config('conteudo.icones.departamentos')))
            ],
            'cor' => 'sometimes|nullable|regex:#[a-zA-Z0-9]{6}#'
        ]);
        //Iniciando Transação
        \DB::beginTransaction();
        try {

            //Criando Setor
            $setor = Setor::findOrFail($id_setor);
            //Preenchendo
            $setor->fill($request->all());
            //Impossível alterar o departamento
            //$setor->id_departamento = $id_departamento;
            //Salvando
            $setor->save();
            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Setor salvo com sucesso", $setor, "set_03");


        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }


    public function remover(Request $request, $id_departamento, $id_setor)
    {
        /** Bloqueio do Request **/
        $block = $this->bloquearRequest($request);
        if ($block) {
            return $block;
        }
        /** Validar **/
        \Validator::validate(['id' => $id_setor], ['id' => 'required|string|size:36|exists:empresa_setores,id']);
        //Começar a transação
        \DB::beginTransaction();
        try {
            /** Obter o setor selecionado **/
            $setor = Setor::where('id_departamento', $id_departamento)->where('id', $id_setor)->firstOrFail();
            //Verificação
            //TODO::Melhorar Verificação
            //Removendo
            $setor->delete();
            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Setor removido com sucesso.", [], "set_05");
        } catch (\Exception $exception) {
            \DB::rollBack();
            ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    public function definirLider(Request $request, $id_setor)
    {
        /** Bloqueio do Request **/
        $block = $this->bloquearRequest($request);
        if ($block) {
            return $block;
        }
        /** Obter informações de um departamento específico **/
        //Validar
        \Validator::validate($request->all() + ['id' => $id_setor],
            [
                'id' => 'required|string|size:36|exists:empresa_setores,id',
                'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
            ]
        );
        //Obter
        $setor = Setor::where('id', $id_setor)->firstOrFail();
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $request->input('id_colaborador'))->firstOrFail();
        //Definindo Lider
        $setor->id_lider = $colaborador->id;
        $setor->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Lider Definido", $colaborador->load(['pessoaFisica', 'usuario']), 'set_06');
    }

}
