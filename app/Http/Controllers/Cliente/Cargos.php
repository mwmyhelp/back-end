<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CargoRepository;
use App\Http\Requests\CargoRequest;
use Illuminate\Http\Request;

class Cargos extends Controller
{

    private $repository;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Colaboradores
     */
    private $colaboradores;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Departamentos
     */
    private $departamentos;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Setores
     */
    private $setores;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Cargos
     */
    private $cargos;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Atribuicoes
     */
    private $atribuicoes;

    public function __construct(CargoRepository $cargoRepository,
                                \App\Http\Controllers\Api\Empresa\Colaboradores $colaboradores,
                                \App\Http\Controllers\Api\Empresa\Departamentos $departamentos,
                                \App\Http\Controllers\Api\Empresa\Setores $setores,
                                \App\Http\Controllers\Api\Empresa\Cargos $cargos,
                                \App\Http\Controllers\Api\Empresa\Atribuicoes $atribuicoes)
    {
        $this->repository = $cargoRepository;
        $this->colaboradores = $colaboradores;
        $this->departamentos = $departamentos;
        $this->setores = $setores;
        $this->cargos = $cargos;
        $this->atribuicoes = $atribuicoes;
    }

    public function index(Request $request)
    {
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->listar($request);
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        return view('cliente.departamentos.cargos.index', $dados);
    }

    public function adicionar(Request $request)
    {
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->obter($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        return view('cliente.departamentos.cargos.adicionar', $dados);
    }

    public function criar(CargoRequest $request)
    {
        try {
            $cargo = $this->repository->store($request);
            //Retornando
            return redirect()->route('cliente.cargos', ['id_departamento' => $request->route('id_departamento')])->with(["alertaSucesso" => "O cargo foi adicionado com sucesso!"]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu." . $exception->getMessage()])->withInput();
        }
    }

    public function info(Request $request)
    {
        //Departamento
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->obter($request, $request->route('id_departamento'));
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        //Setor
        $response = $this->setores->obter($request, $request->route('id_departamento'), $request->route('id_cargo'));
        $body = json_decode($response->body());
        $dados['cargo'] = $body->dados;
        //Atribuições
        $response = $this->atribuicoes->obter($request, $request->route('id_departamento'), $request->route('id_cargo'));

        $response = \Http::withToken(\Session::get('bearer_token'))
            ->get(config('app.api_url') . "regs/atribuicoes/?anexo_tipo=cargo&anexo_id=" . $request->route('id_cargo'));
        $body = json_decode($response->body());
        $dados['att_cargo'] = $body->dados;
        return view('cliente.departamentos.cargos.detalhes', $dados);
    }

    public function editar(Request $request){
        //Departamento
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/?exibir=completo");
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        //Setor
        $response = \Http::withToken(\Session::get('bearer_token'))
            ->get(config('app.api_url') . "empresa/departamentos/" . $request->route('id_departamento') . "/cargos/" . $request->route('id_cargo'));
        $body = json_decode($response->body());
        $dados['cargo'] = $body->dados;
        return view('cliente.departamentos.cargos.editar', $dados);
    }

    public function salvar(Request $request)
    {
        //Iniciando Transação
        try {
            $cargo = $this->repository->update($request->all(), $request->route('id_departamento'), $request->route('id_cargo'));

            //Retornando
            return redirect()->route('cliente.cargos', ['id_departamento' => $request->route('id_departamento')])->with(["alertaSucesso" => "O cargo foi alterado com sucesso!"]);


        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu." . $exception->getMessage()])->withInput();
        }
    }

}
