<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ColaboradorRepository;
use App\Http\Requests\ColaboradorRequest;
use App\Models\CEO\Normativa;
use App\Models\CEO\Procedimento;
use Illuminate\Http\Request;

class Colaboradores extends Controller
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
     * @var \App\Http\Controllers\Api\Empresa\Atribuicoes
     */
    private $atribuicoes;
    /**
     * @var \App\Http\Controllers\Api\Empresa\Cargos
     */
    private $cargos;

    public function __construct(ColaboradorRepository $atribuicaoRepository,
                                \App\Http\Controllers\Api\Empresa\Colaboradores $colaboradores,
                                \App\Http\Controllers\Api\Empresa\Departamentos $departamentos,
                                \App\Http\Controllers\Api\Empresa\Cargos $cargos,
                                \App\Http\Controllers\Api\Empresa\Atribuicoes $atribuicoes)
    {
        $this->repository = $atribuicaoRepository;
        $this->colaboradores = $colaboradores;
        $this->departamentos = $departamentos;
        $this->atribuicoes = $atribuicoes;
        $this->cargos = $cargos;
    }

    public function index(Request $request)
    {
        //** Tela inicial para gestão de Colaboradores **/
        $response = $this->colaboradores->listar($request);
        if ($response->ok()) {
            $json = json_decode($response->body());
            $data['colaboradores'] = $json->dados;
        } else {
            $data['colaboradores'] = [];
        }
        return view('cliente.colaboradores.index', $data);
    }

    public
    function adicionar(Request $request)
    {
        /** Tela para adicionar colaborador **/

        return view('cliente.colaboradores.adicionar');
    }

    public
    function criar(ColaboradorRequest $request)
    {
        /** Criando um Colaborador **/
        //Preparando os dados
        $dados = $request->all();
        $response = $this->colaboradores->criar($request);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso' && $body->code = 'col_01') {
                //Conta criada com sucesso.
                return redirect()->route('cliente.colaboradores')->with(["alertaSucesso" => "O colaborador foi criado com sucesso!"]);
            }
            //Algum problema foi encontrado

        }

        //Outros níveis de requisição
        //Verificar se é validação
        if ($body->codigo == "vl01") {
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

    public function detalhes(Request $request)
    {
        /** Obter Dados do Colaborador **/
        $response = $this->colaboradores->obter($request, $request->route('id_colab'));

        $body = json_decode($response->body());
        $dados['colaborador'] = $body->dados;

        /** Obter os Departamentos **/
        $request->request->add(['exibir' => 'completo']);
        $response = $this->departamentos->listar($request);
        $body = json_decode($response->body());
        $dados['lista_departamentos'] = $body->dados;

        /** Obter os Cargos **/
        $response = $this->cargos->todos($request);
        $body = json_decode($response->body());
        $dados['lista_cargos'] = $body->dados;

        /** Obter Papeis **/
        $response = $this->colaboradores->obterPapeis($request, $request->route('id_colab'));
        $body = json_decode($response->body());
        $dados['lista_papeis'] = $body->dados;

        /** Obter Atribuições **/
        //Att do próprio colaborador
        $request->request->add(['anexo_tipo' => 'colaborador']); //add request
        $request->request->add(['anexo_id' => $request->route('id_colab')]); //add request
        $response = $this->atribuicoes->listar($request);
        $body = json_decode($response->body());
        $dados['att_colaborador'] = $body->dados;

        /** Obter Normativas Gerais e do Departamento **/
        //Lista de Departamentos
        $temp_departamentos = [];
        foreach ($dados['colaborador']->cargos as $item) {
            $temp_departamentos[$item->cargo->id_departamento] = $item->cargo->departamento->nome;
        }
        //Normativas Gerais
        $dados['normativas_departamentos'] = [];
        $dados['normativas_gerais'] = Normativa::where('bee_conta',\Auth::user()->bee_conta)->where('geral',1)->get();
        //Por departamentos
        foreach($temp_departamentos as $index => $temp){
            $dados['normativas_departamentos'][$index] = [
                 'titulo' => $temp,
                 'normativas' => Normativa::where('bee_conta',\Auth::user()->bee_conta)->where('departamentos','LIKE','%'.$index.'%')->get()
            ];
        }

        /** Obter Procedimentos Gerais e do Departamento **/
        //Procedimentos Gerais
        $dados['procedimentos_departamentos'] = [];
        $dados['procedimentos_gerais'] = Procedimento::where('bee_conta',\Auth::user()->bee_conta)->where('geral',1)->get();
        //Por departamentos
        foreach ($temp_departamentos as $index => $temp) {
            $dados['procedimentos_departamentos'][$index] = [
                'titulo' => $temp,
                'procedimentos' => Procedimento::where('bee_conta', \Auth::user()->bee_conta)->where('departamentos', 'LIKE', '%' . $index . '%')->get()
            ];
        }

        return view('cliente.colaboradores.detalhes', $dados);
    }

    public function salvar(Request $request)
    {
        /** Criando um Colaborador **/
        $id = $request->route('id_colab');

        $response = $this->colaboradores->salvar($request, $id);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso' && $body->code = 'col_01') {
                //Conta criada com sucesso.
                return redirect()->back()->with(["alertaSucesso" => "O colaborador foi salvo com sucesso!"]);
            }
            //Algum problema foi encontrado
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

    public function ocuparCargo(Request $request)
    {
        $id = $request->route('id_colab');

        $response = $this->colaboradores->ocuparCargo($request, $id);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso') {
                //Conta criada com sucesso.
                return redirect()->back()->with(["alertaSucesso" => "O colaborador foi posicionado no cargo!"]);
            }
            //Algum problema foi encontrado

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

    public function desocuparCargo(Request $request)
    {
        $id = $request->route('id_colab');
        $request->request->add(['id_cargo' => $request->get('cargo')]);
        $response = $this->colaboradores->desocuparCargo($request, $id);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso') {
                //Conta criada com sucesso.
                return redirect()->back()->with(["alertaSucesso" => "O colaborador foi removido do cargo!"]);
            }
            //Algum problema foi encontrado

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
