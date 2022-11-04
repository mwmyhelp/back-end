<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SetorRepository;
use App\Http\Requests\SetorRequest;
use Illuminate\Http\Request;

class Setores extends Controller
{
    private $repository;
    /**
     * @var SetorRepository
     */
    private $setorRepository;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Colaboradores
     */
    private $colaboradores;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Departamentos
     */
    private $departamentos;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Cargos
     */
    private $cargos;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Atribuicoes
     */
    private $atribuicoes;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Setores
     */
    private $setores;

    public function __construct(SetorRepository $setorRepository,
                                \App\Http\Controllers\Api\Empresa\Colaboradores $colaboradores,
                                \App\Http\Controllers\Api\Empresa\Departamentos $departamentos,
                                \App\Http\Controllers\Api\Empresa\Setores $setores,
                                \App\Http\Controllers\Api\Empresa\Cargos $cargos,
                                \App\Http\Controllers\Api\Empresa\Atribuicoes $atribuicoes)
    {
        $this->repository = $setorRepository;
        $this->colaboradores = $colaboradores;
        $this->departamentos = $departamentos;
        $this->cargos = $cargos;
        $this->atribuicoes = $atribuicoes;
        $this->setores = $setores;
    }

    public function index(Request $request)
    {
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->listar($request);
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        return view('cliente.departamentos.setores.index', $dados);
    }

    public function adicionar(Request $request)
    {
        $request->request->add(['exibir' => 'completo']);

        $response = $this->departamentos->obter($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        return view('cliente.departamentos.setores.adicionar', $dados);
    }

    public function criar(SetorRequest $request)
    {
        /** Criando um novo setor **/
        $response = $this->setores->criar($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso' && $body->code = 'car_02') {
                //Conta criada com sucesso.
                return redirect()->route('cliente.setores', ['id_departamento' => $request->route('id_departamento')])->with(["alertaSucesso" => "O setor foi adicionado com sucesso!"]);
            }
            //Algum problema foi encontrado
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu."])->withInput();

        }

        //Outros níveis de requisição
        //Verificar se é validação
        if($body->codigo == "vl01"){
            //Validação de Dados
            return redirect()->back()->with(['erroValidacao' => $body->bag])->withInput();
        }
        //Aqui deu algum erro mais barbaro
        if (isset($body->msg)) {
            return redirect()->back()->with(['alertaErro' => $body->msg])->withInput();
        }

        //Erro fatal
        return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu."])->withInput();
    }

    public function info(Request $request)
    {
        //Departamento
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->obter($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        //Setor
        $response = $this->setores->obter($request, $request->route('id_departamento'), $request->route('id_setor'));
        $body = json_decode($response->body());
        $dados['setor'] = $body->dados;
        return view('cliente.departamentos.setores.detalhes', $dados);
    }

    public function editar(Request $request)
    {
        //Departamento
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->obter($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        //Setor
        $response = $this->setores->obter($request);
        $body = json_decode($response->body());
        $dados['setor'] = $body->dados;
        return view('cliente.departamentos.setores.editar', $dados);
    }

    public function salvar(Request $request)
    {
        /** Salvando setor **/
        $response = $this->setores->salvar($request, $request->route('id_departamento'), $request->route('id_setor'));
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso' && $body->code = 'set_03') {
                //Conta criada com sucesso.
                return redirect()->route('cliente.setores', ['id_departamento' => $request->route('id_departamento')])->with(["alertaSucesso" => "O setor foi alterado com sucesso!"]);
            }
            //Algum problema foi encontrado
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu."])->withInput();

        }

        //Outros níveis de requisição
        //Verificar se é validação
        if($body->codigo == "vl01"){
            //Validação de Dados
            return redirect()->back()->with(['erroValidacao' => $body->bag])->withInput();
        }
        //Aqui deu algum erro mais barbaro
        if(isset($body->msg)){
            return redirect()->back()->with(['alertaErro' => $body->msg])->withInput();
        }

        //Erro fatal
        return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu."])->withInput();
    }

}
