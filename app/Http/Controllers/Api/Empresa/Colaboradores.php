<?php

namespace App\Http\Controllers\Api\Empresa;

use App\Helpers\ReturnHelper;
use App\Http\Controllers\Api\Controller;
use App\Http\Controllers\WebControllers\BeeCeo\Normativas;
use App\Http\Repositories\ColaboradorRepository;
use App\Http\Requests\CriarColaboradorRequest;
use App\Models\CEO\BeeDoc;
use App\Models\CEO\Diagrama;
use App\Models\CEO\Normativa;
use App\Models\CEO\Procedimento;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\Colaborador;
use App\Models\Empresa\Departamento;
use App\Models\Empresa\Setor;
use App\Models\Hive\PessoaFisica;
use App\Models\Pivot\CargoOcupado;
use App\Models\User;
use App\Notifications\SenhaTemporariaConta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use laravelApiHelpers\ResponseHelper;
use laravelApiHelpers\ValidationHelper;

class Colaboradores extends Controller
{

    protected $repository;

    public function __construct(ColaboradorRepository $atribuicaoRepository)
    {
        $this->repository = $atribuicaoRepository;
    }

    /** ↓↓↓ Nova Estrutura */
    public function criar(Request $request)
    {
        /** Validar **/
        $request->validate(['dados.celular' => 'sometimes|nullable|celular_com_ddd',
            'dados.cpf' => 'required|string|cpf|unique:users,cpf',
            'dados.email' => 'sometimes|nullable|email',
            'dados.estado_civil' => 'required',
            'dados.nascimento' => 'required|date',
            'dados.nome' => 'required',
            'dados.sangue' => 'sometimes|nullable',
            'dados.sobrenome' => 'required',
            'desenvolvimento.experiencias' => 'sometimes|nullable',
            'desenvolvimento.formacao_academica' => 'sometimes|nullable',
            'desenvolvimento.habilidades_naturais' => 'sometimes|nullable',
            'desenvolvimento.nivel_formacao' => 'required',
            'desenvolvimento.vem_ao_trabalho' => 'required',
            'institucional.admissao' => 'required|date',
            'institucional.chefia_imediata' => 'sometimes|nullable|exists:empresa_colaboradores,id',
            'institucional.empresa_anterior' => 'sometimes|nullable',
            'institucional.posicoes_ocupadas' => 'sometimes|nullable|array',
            'institucional.tipo_acesso' => 'required',
            'outros.atividades_lazer' => 'sometimes|nullable',
            'outros.gostos_comida' => 'sometimes|nullable',
            'outros.objetivos_vida' => 'sometimes|nullable',
            'outros.idade_filhos' => 'sometimes|nullable',
            'outros.numero_filhos' => 'required|numeric'
        ]);

        /** Construindo o Cadastro do Colaborador **/
        DB::beginTransaction();
        try {
            /** Criando Pessoa Física **/
            $pessoa_fisica = new PessoaFisica();
            //Preenchendo
            $pessoa_fisica->nome = $request->input('dados.nome');
            $pessoa_fisica->sobrenome = $request->input('dados.sobrenome');
            $pessoa_fisica->cpf = $request->input('dados.cpf');
            $pessoa_fisica->nascimento = $request->input('dados.nascimento');
            $pessoa_fisica->telefone_celular = $request->input('dados.celular');
            $pessoa_fisica->email = $request->input('dados.email');
            //Salvando
            $pessoa_fisica->save();
            /** Criando Usuário **/
            $usuario = new User();
            //Preenchendo
            $usuario->tipo = 'colaborador';
            $usuario->bee_conta = \Auth::user()->bee_conta;
            $usuario->name = $request->input('dados.nome');
            $usuario->email = $request->input('dados.email');
            //Gerar senha
            $senha_gerada = rand(11111111, 99999999);
            $usuario->password = \Hash::make($senha_gerada);
            $usuario->cpf = $request->input('dados.cpf');
            $usuario->acao_obrigatoria = 'troca_senha';
            $usuario->unique_token = Str::random(64);
            //Salvando
            $usuario->save();
            /** Criando Documento de Atribuições **/
            $doc = new BeeDoc();
            $doc->created_by = \Auth::id();
            $doc->bee_conta = \Auth::user()->bee_conta;
            $doc->tipo = 'atribuicao_colaborador';
            $doc->titulo = "Atribuições do Colaborador";
            $doc->status = "A";
            //Salvando
            $doc->save();
            /** Gerando Colaborador */
            $colaborador = new Colaborador();
            //Preenchendo
            $colaborador->bee_conta = \Auth::user()->bee_conta;
            $colaborador->id_pessoa_fisica = $pessoa_fisica->id;
            $colaborador->id_usuario = $usuario->id;
            $colaborador->id_documental = $doc->id;
            $colaborador->tipo_sanguineo = $request->input('dados.sangue');
            $colaborador->estado_civil = $request->input('dados.estado_civil');
            $colaborador->data_admissao = $request->input('institucional.admissao');
            $colaborador->tipo_acesso = $request->input('institucional.tipo_acesso');
            $colaborador->chefia_imediata = $request->input('institucional.chefia_imediata');
            $colaborador->empresa_anterior = $request->input('institucional.empresa_anterior');
            $colaborador->experiencia_profissional = $request->input('desenvolvimento.experiencias');
            $colaborador->nivel_formacao = $request->input('desenvolvimento.nivel_formacao');
            $colaborador->formacao_academica = $request->input('desenvolvimento.formacao_academica');
            $colaborador->habilidades_naturais = $request->input('desenvolvimento.habilidades_naturais');
            $colaborador->habilidades_profissionais = $request->input('desenvolvimento.habilidades_profissionais');
            $colaborador->vem_ao_trabalho = $request->input('desenvolvimento.vem_ao_trabalho');
            $colaborador->numero_filhos = $request->input('outros.numero_filhos');
            $colaborador->idades = $request->input('outros.idade_filhos');
            $colaborador->objetivos_vida = $request->input('outros.objetivos_vida');
            $colaborador->atividades_lazer = $request->input('outros.atividades_lazer');
            $colaborador->gostos_comida = $request->input('outros.gostos_comida');
            //Salvando Colaborador
            $colaborador->save();
            //Exercer os cargos
            if($request->input('institucional.posicoes_ocupadas')){
                foreach ($request->input('institucional.posicoes_ocupadas') as $id_cargo) {
                    //Remover _cargo_ _
                    $id = str_replace("cargo", "", str_replace("_", "", $id_cargo));
                    //Ocupar cargo
                    $cargoOcupado = new CargoOcupado();
                    $cargoOcupado->id_colaborador = $colaborador->id;
                    $cargoOcupado->id_cargo = $id;
                    $cargoOcupado->bee_conta = \Auth::user()->bee_conta;
                    //Salvar Cargo Ocupado
                    $cargoOcupado->save();
                }
            }
            //Mensagem
            $msg = "O colaborador foi criado com sucesso. A senha de acesso temporária é: " . $senha_gerada . ". No primeiro acesso do colaborador, ele deve trocar a senha. ";
            //Notificar caso necessário
            if ($usuario->email) {
                //Notificar
                $usuario->notify(new SenhaTemporariaConta($usuario->cpf, $senha_gerada));
                $msg .= "A senha também foi enviada no e-mail informado no cadastro.";
            }
            //Comitar
            DB::commit();
            return ResponseHelper::sucessoAcao($msg, $colaborador);
        } catch (\Exception $exception) {
            DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** ↓↓↓ Nova Estrutura */
    public function listar(Request $request)
    {
        /** Listar todos os colaboradores cadastrados na BeeConta do usuário **/

        $lista = Colaborador::select(['id', 'id_pessoa_fisica', 'id_usuario', 'id_documental', 'tipo_acesso'])
            ->with(['cargos.cargo.departamento'])
            ->where('bee_conta', \Auth::user()->bee_conta_id)
            ->whereHas('pessoaFisica', function ($q) use ($request) {
                $q->whereRaw("CONCAT(nome,' ',sobrenome) LIKE '%" . $request->input('nome') . "%'");
            })
            ->limit($request->input('num'))
            ->get();

        return ResponseHelper::sucessoObter($lista, [], "col_02", "Colaborador obtido com sucesso.");
    }

    public function salvar(Request $request, $id_colaborador)
    {
        /** Alterar Colaborador **/
        //Validar
        \Validator::validate($request->all() + ['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id',
            'cpf' => 'prohibited',
            'email' => 'prohibited',
            'nome' => 'required|string|max:200',
            'sobrenome' => 'required|string|max:200',
            'nascimento' => 'required|date',
        ]);
        /** Transação **/
        \DB::beginTransaction();
        try {
            //Obtendo Colaborador
            $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();

            //Atualizando pessoa física
            $pessoa_fisica = $colaborador->pessoaFisica;
            $pessoa_fisica->fill($request->all());
            $pessoa_fisica->save();

            //Atualizando usuário
            $user = $colaborador->usuario;
            $user->name = $request->input('nome');
            $user->save();

            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Colaborador alterado com sucesso.", $colaborador->load(['pessoaFisica', 'usuario']), "col_03");

        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    public function salvarAtribuicoes(Request $request, $id_colaborador)
    {
        /** Validando **/
        \Validator::validate($request->all(), [
            'atribuicoes' => 'required',
            'bee_conta' => 'prohibited'
        ]);
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);
        //Iniciando Transação
        \DB::beginTransaction();
        try {
            //Obtendo Colaborador
            $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();

            //Alterando
            $colaborador->atribuicoes = $request->input('atribuicoes');

            //Salvando
            $colaborador->save();

            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Atribuições salvas com sucesso", $colaborador->load(['pessoaFisica', 'usuario']), "col_05");


        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    /** ↓↓↓ Nova Estrutura */
    public function obter(Request $request, $id_colaborador)
    {
        /** Alterar Colaborador **/
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);

        //Obtendo Colaborador
        $colaborador = Colaborador::with(['cargos.cargo.departamento'])->where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();
        $colaborador->load('chefe');
        //Retornando
        return ResponseHelper::sucessoObter($colaborador->load(['pessoaFisica', 'usuario']), [], "col_04", "Colaborador obtido com sucesso.");

    }

    public function obterAtribuicoes(Request $request, $id_colaborador)
    {
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);

        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();

        //Retornando apenas atribuições
        return ResponseHelper::sucessoObter($colaborador->atribuicoes, [], "col_07", "Atribuições obtidas com sucesso.");
    }

    public function remover(Request $request, $id_colaborador)
    {
        /** Remover Colaborador **/
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);

        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();

        //TODO::Melhorar Validação

        \DB::beginTransaction();

        try {
            //Remover Pessoa Física
            $colaborador->pessoaFisica->delete();
            //Remover Usuário
            $colaborador->usuario->delete();
            //Remover Colaborador
            $colaborador->delete();
            //Executando
            \DB::commit();
            //Retornando
            return ResponseHelper::sucessoAcao("Colaborador removido com sucesso.", [], "col_04");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    /** ↓↓↓ Nova Estrutura */
    public function ocuparCargo(Request $request, $id_colaborador)
    {
        /** Ocupar Cargo Colaborador **/
        //Validar
        \Validator::validate($request->all() + ['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id',
            'id_cargo' => [
                'required',
                'string',
                'size:36',
                'exists:empresa_cargos,id',
                Rule::unique('empresa_cargos_ocupados')->where(function ($query) use ($request, $id_colaborador) {
                    //Unico cargo ocupado
                    $query->where('id_colaborador', $id_colaborador)->where('id_cargo', $request->input('id_cargo'));
                })
            ]
        ]);
        //Obter Cargo
        $cargo = Cargo::where('bee_conta', \Auth::user()->bee_conta)->where('id', $request->input('id_cargo'))->firstOrFail();

        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();

        //Associando
        $cargo_ocupado = new CargoOcupado();
        $cargo_ocupado->id_colaborador = $colaborador->id;
        $cargo_ocupado->id_cargo = $cargo->id;
        $cargo_ocupado->bee_conta = \Auth::user()->bee_conta;
        //Salvando
        $cargo_ocupado->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Cargo associado com sucesso.", $cargo, "col_08");
    }

    /** ↓↓↓ Nova Estrutura */
    public function desocuparCargo(Request $request, $id_colaborador)
    {
        /** Ocupar Cargo Colaborador **/
        //Validar
        \Validator::validate($request->all() + ['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id',
            'id_cargo' => [
                'required',
                'string',
                'size:36',
                'exists:empresa_cargos,id'
            ]
        ]);
        //Obter Cargo
        $cargo = Cargo::where('bee_conta', \Auth::user()->bee_conta)->where('id', $request->input('id_cargo'))->firstOrFail();
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();
        //Obter Associacao e Removendo
        $cargo_ocupado = CargoOcupado::where('bee_conta', \Auth::user()->bee_conta)->where('id_cargo', $cargo->id)->where('id_colaborador', $colaborador->id)->delete();

        //Retornando
        return ResponseHelper::sucessoAcao("Cargo desocupado com sucesso.", $cargo, "col_09");
    }

    /** ↓↓ Nova Função **/
    public function listarCargosOcupados(Request $request, $id_colaborador)
    {
        /** Retorna todos os dados ocupados por um colaborador, junto com uma estrutura documental **/
        //Validar
        \Validator::validate($request->all() + ['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);

        /** Obter Cargos */
        $cargos = CargoOcupado::where('bee_conta', \Auth::user()->bee_conta)->where('id_colaborador', $id_colaborador)->get();

        /** Preparar Documentos */
        $lista = array();

        /** Para Cada Cargo */

        foreach ($cargos as $ocupado) {

            $at = [];
            $po = [];
            $nr = [];

            /** Obter Atribuições **/
            //Atribuição do Cargo
            $at[$ocupado->cargo->beedoc->id] = 'Atribuição do Cargo : ' . $ocupado->cargo->beedoc->titulo;
            //Atribuição do Setor se existir
            if ($ocupado->cargo->setor) {
                $at[$ocupado->cargo->setor->beedoc->id] = 'Atribuição do Setor : ' . $ocupado->cargo->setor->beedoc->titulo;
            }
            /** Obter Procedimentos **/
            //Procedimentos do Cargo
            $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_cargo_' . $ocupado->cargo->id . '_%')->get();
            foreach ($procedimentos as $procedimento) {
                $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
            }
            //Procedimentos do Setor
            if ($ocupado->cargo->setor) {
                $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_setor_' . $ocupado->cargo->setor->id . '_%')->get();
                foreach ($procedimentos as $procedimento) {
                    $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
                }
            }
            //Procedimentos dos Departamentos e Departamentos Ascendentes
            if($ocupado && isset($ocupado->cargo) && isset($ocupado->cargo->departamento)){
                foreach ($ocupado->cargo->departamento->trilhaAsc as $id_dep => $dep) {
                    $diagramas = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('aplicado_em', 'LIKE', '%_dep_' . $id_dep . '_%')->get();
                    foreach ($diagramas as $diagrama) {
                        $dg[$diagrama->id] = "DG " . $diagrama->gcodigo . ' - ' . $diagrama->titulo;
                    }
                }
            }


            /** Obter Normativas **/
            //Normativas do Setor
            if ($ocupado->cargo->setor) {
                $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_setor_' . $ocupado->cargo->setor->id . '_%')->get();
                foreach ($normativas as $normativa) {
                    $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
                }
            }
            //Normativas dos Departamentos e Departamentos Ascendentes
            if($ocupado && isset($ocupado->cargo) && isset($ocupado->cargo->departamento)){
                foreach ($ocupado->cargo->departamento->trilhaAsc as $id_dep => $dep) {
                    $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_dep_' . $id_dep . '_%')->get();
                    foreach ($normativas as $normativa) {
                        $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
                    }
                }
            }


            $lista[] = [
                'cargo' => $ocupado->cargo,
                'procedimentos' => $po,
                'normativas' => $nr,
                'atribuicoes' => $at
            ];

        }

        /** Preparar Retorno **/

        //Retorno
        return ResponseHelper::sucessoAcao("Lista de cargos obtidas", $lista);


    }

    /** ↓↓ Nova Função **/
    public function listarDocumentos(Request $request, $id_colaborador)
    {
        /** Retorna todos os documentos que o colaborador possue **/
        //Validar
        \Validator::validate($request->all() + ['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);

        /** Obter Cargos */
        $cargos = CargoOcupado::where('bee_conta', \Auth::user()->bee_conta)->where('id_colaborador', $id_colaborador)->get();

        /** Preparar Documentos */
        $lista = array();
        $at = [];
        $po = [];
        $nr = [];
        $dg = [];

        /** Pegando Pessoal */
        $colaborador = Colaborador::where('bee_conta',\Auth::user()->bee_conta)->where('id',$id_colaborador)->first();
        $at[$colaborador->id_documental] = "Minhas Atribuições Pessoais";

        /** Pegando Geral */
        //Atribuições Geral ???

        /** Obter Procedimentos **/
        //Procedimentos Gerais
        $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_geral_%')->get();
        foreach ($procedimentos as $procedimento) {
            $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
        }
        //Normativas Gerais
        $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_geral_%')->get();
        foreach ($normativas as $normativa) {
            $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
        }
        //Diagramas Gerais
        $diagramas = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('aplicado_em', 'LIKE', '%_geral_%')->get();
        foreach ($diagramas as $diagrama) {
            $dg[$diagrama->id] = "DG " . $diagrama->gcodigo . ' - ' . $diagrama->titulo;
        }

        /** Pegando dos Cargos */
        foreach ($cargos as $ocupado) {

            /** Obter Atribuições **/
            //Atribuição do Cargo
            $at[$ocupado->cargo->beedoc->id] = 'Atribuição do Cargo : ' . $ocupado->cargo->beedoc->titulo;
            //Atribuição do Setor se existir
            if ($ocupado->cargo->setor) {
                $at[$ocupado->cargo->setor->beedoc->id] = 'Atribuição do Setor : ' . $ocupado->cargo->setor->beedoc->titulo;
            }
            /** Obter Procedimentos **/
            //Procedimentos do Cargo
            $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_cargo_' . $ocupado->cargo->id . '_%')->get();
            foreach ($procedimentos as $procedimento) {
                $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
            }
            //Procedimentos do Setor
            if ($ocupado->cargo->setor) {
                $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_setor_' . $ocupado->cargo->setor->id . '_%')->get();
                foreach ($procedimentos as $procedimento) {
                    $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
                }
            }
            //Procedimentos dos Departamentos e Departamentos Ascendentes
            if($ocupado && isset($ocupado->cargo) && isset($ocupado->cargo->departamento)){
                foreach ($ocupado->cargo->departamento->trilhaAsc as $id_dep => $dep) {
                    $procedimentos = Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_dep_' . $id_dep . '_%')->get();
                    foreach ($procedimentos as $procedimento) {
                        $po[$procedimento->id_documental] = "PO " . $procedimento->gcodigo . ' - ' . $procedimento->titulo;
                    }
                }
            }


            /** Obter Normativas **/
            // Normativas do Cargo
            $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_cargo_' . $ocupado->cargo->id . '_%')->get();
            foreach ($normativas as $normativa) {
                $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
            }
            //Normativas do Setor
            if ($ocupado->cargo->setor) {
                $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_setor_' . $ocupado->cargo->setor->id . '_%')->get();
                foreach ($normativas as $normativa) {
                    $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
                }
            }
            //Normativas dos Departamentos e Departamentos Ascendentes
            if($ocupado && isset($ocupado->cargo) && isset($ocupado->cargo->departamento)){
                foreach ($ocupado->cargo->departamento->trilhaAsc as $id_dep => $dep) {
                    $normativas = Normativa::where('bee_conta', \Auth::user()->bee_conta)->where('aplicada_em', 'LIKE', '%_dep_' . $id_dep . '_%')->get();
                    foreach ($normativas as $normativa) {
                        $nr[$normativa->id_documental] = "NR " . $normativa->gcodigo . ' - ' . $normativa->titulo;
                    }
                }
            }

            /** Obter Diagramas **/
            //Diagramas do Setor
            if ($ocupado->cargo->setor) {
                $diagramas = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('aplicado_em', 'LIKE', '%_setor_' . $ocupado->cargo->setor->id . '_%')->get();
                foreach ($diagramas as $diagrama) {
                    $dg[$diagrama->id] = "DG " . $diagrama->gcodigo . ' - ' . $diagrama->titulo;
                }
            }

            //Normativas dos Departamentos e Departamentos Ascendentes
            if($ocupado && isset($ocupado->cargo) && isset($ocupado->cargo->departamento)){
                foreach ($ocupado->cargo->departamento->trilhaAsc as $id_dep => $dep) {
                    $diagramas = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('aplicado_em', 'LIKE', '%_dep_' . $id_dep . '_%')->get();
                    foreach ($diagramas as $diagrama) {
                        $dg[$diagrama->id] = "DG " . $diagrama->gcodigo . ' - ' . $diagrama->titulo;
                    }
                }
            }

        }

        /** Preparar Retorno **/
        $lista = [
            'atribuicoes' => $at,
            'procedimentos' => $po,
            'normativas' => $nr,
            'diagramas' => $dg
        ];
        //Retorno
        return ResponseHelper::sucessoAcao("Lista de documentos obtidas", $lista);


    }

    /** ↓↓↓ Nova Estrutura */
    public function setBeeLider(Request $request, $id_colaborador)
    {
        /** Ocupar Cargo Colaborador **/
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id',
        ]);
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();
        //Obter usuário
        $user = $colaborador->usuario;
        //Atualizar
        $user->tipo = 'bee_lider';
        //Salvando
        $user->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Definido como BeeLider.");
    }

    /** ↓↓↓ Nova Estrutura */
    public function unsetBeeLider(Request $request, $id_colaborador)
    {
        /** Ocupar Cargo Colaborador **/
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id',
        ]);
        //Obtendo Colaborador
        $colaborador = Colaborador::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_colaborador)->firstOrFail();
        //Obter usuário
        $user = $colaborador->usuario;
        //Atualizar
        $user->tipo = 'colaborador';
        //Salvando
        $user->save();

        //Retornando
        return ResponseHelper::sucessoAcao("Removido como BeeLider.");
    }

    public function obterPapeis(Request $request, $id_colaborador)
    {
        //Validar
        \Validator::validate(['id_colaborador' => $id_colaborador], [
            'id_colaborador' => 'required|string|size:36|exists:empresa_colaboradores,id'
        ]);
        /** Obter os papeis do usuário **/
        //Coordenador de Departamento
        $coord_departamentos = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id_coordenador', $id_colaborador)->get();
        //Lider de Departamento
        $lider_departamentos = Departamento::where('bee_conta', \Auth::user()->bee_conta)->where('id_lider', $id_colaborador)->get();
        //Lider de Setor
        $lider_setores = Setor::where('id_lider', $id_colaborador)->get();

        /** Retornando **/
        return ResponseHelper::sucessoObter([
            'departamentos_coordenados' => $coord_departamentos,
            'departamentos_liderados' => $lider_departamentos,
            'setores_liderados' => $lider_setores
        ], [], "col_09");
    }

}
