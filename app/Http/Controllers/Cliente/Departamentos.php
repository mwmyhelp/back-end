<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DepartamentoRepository;
use App\Models\CEO\Normativa;
use Illuminate\Http\Request;

class Departamentos extends Controller
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

    public function __construct(DepartamentoRepository $departamentoRepository,
                                \App\Http\Controllers\Api\Empresa\Colaboradores $colaboradores,
                                \App\Http\Controllers\Api\Empresa\Departamentos $departamentos,
                                \App\Http\Controllers\Api\Empresa\Setores $setores,
                                \App\Http\Controllers\Api\Empresa\Cargos $cargos,
                                \App\Http\Controllers\Api\Empresa\Atribuicoes $atribuicoes)
    {
        $this->repository = $departamentoRepository;
        $this->colaboradores = $colaboradores;
        $this->departamentos = $departamentos;
        $this->setores = $setores;
        $this->cargos = $cargos;
        $this->atribuicoes = $atribuicoes;
    }

    public function index(Request $request)
    {
        return view('cliente.departamentos.index');
    }

    public function adicionar(Request $request)
    {
        return view('cliente.departamentos.adicionar');
    }

    public function criar(Request $request)
    {
        /** Criando um novo departamento **/
        //Preparando os dados
        $dados = $request->all();
        //Consumir API
        $response = \Http::withToken(\Session::get('bearer_token'))->asForm()->post(config('app.api_url') . "empresa/departamentos/criar", $dados);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if ($response->ok()) {
            //Tudo ok?
            if ($body->status == 'sucesso' && $body->code = 'dep_01') {
                //Conta criada com sucesso.
                return redirect()->route('cliente.departamentos')->with(["alertaSucesso" => "O departamento foi criado com sucesso!"]);
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

    public function info(Request $request){
        /** Obtendo o Departamentos **/
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/?exibir=completo");
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        /** Obtendo Colaboradores **/
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/colaboradores/");
        $body = json_decode($response->body());
        $dados['colaboradores'] = $body->dados;

        /** Obtendo Normativas */
        $dados['normativas'] = Normativa::where('departamentos','LIKE','%'.$request->route('id_departamento').'%')->get();

        return view('cliente.departamentos.detalhes',$dados);
    }

    public function editar(Request $request){
        /** Obtendo o Departamentos **/
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/?exibir=completo");
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        return view('cliente.departamentos.editar',$dados);
    }

    public function salvar(Request $request){
        /** Salvando um departamento **/
        //Preparando os dados
        $dados = $request->all();
        //Consumir API
        $response = \Http::withToken(\Session::get('bearer_token'))
            ->asForm()
            ->post(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/salvar",$dados);
        $body = json_decode($response->body());
        //Requisição a nivel 200
        if($response->ok()){
            //Tudo ok?
            if($body->status == 'sucesso' && $body->code = 'dep_01'){
                //Conta criada com sucesso.
                return redirect()->route('cliente.departamentos.info',['id_departamento' => $request->route('id_departamento')])
                    ->with(["alertaSucesso" => "O departamento foi salvo com sucesso!"]);
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

    public function lider(Request $request){
        if($request->input('id_colaborador') == 0){
            //Remover o Lider
            //Consumir API
            $response = \Http::withToken(\Session::get('bearer_token'))
                ->asForm()
                ->post(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/remLider");
            $body = json_decode($response->body());
            //Requisição a nivel 200
            if($response->ok()){
                //Tudo ok?
                if($body->status == 'sucesso'){
                    //Conta criada com sucesso.
                    return redirect()->back()
                        ->with(["alertaSucesso" => "Lider removido."]);
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
        }else{
            //Definir o Coordenador
            //Preparando os dados
            $dados = $request->all();
            //Consumir API
            $response = \Http::withToken(\Session::get('bearer_token'))
                ->asForm()
                ->post(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/defLider",$dados);
            $body = json_decode($response->body());
            //Requisição a nivel 200
            if($response->ok()){
                //Tudo ok?
                if($body->status == 'sucesso'){
                    //Conta criada com sucesso.
                    return redirect()->back()
                        ->with(["alertaSucesso" => "O lider foi alterado"]);
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
        dd($request->all());
    }

    public function coordenador(Request $request){
        if($request->input('id_colaborador') == 0){
            //Remover o Coordenador
            //Consumir API
            $response = \Http::withToken(\Session::get('bearer_token'))
                ->asForm()
                ->post(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/remCoordenador");
            $body = json_decode($response->body());
            //Requisição a nivel 200
            if($response->ok()){
                //Tudo ok?
                if($body->status == 'sucesso'){
                    //Conta criada com sucesso.
                    return redirect()->back()
                        ->with(["alertaSucesso" => "Coordenador removido."]);
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
        }else{
            //Definir o Coordenador
            //Preparando os dados
            $dados = $request->all();
            //Consumir API
            $response = \Http::withToken(\Session::get('bearer_token'))
                ->asForm()
                ->post(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/defCoordenador",$dados);
            $body = json_decode($response->body());
            //Requisição a nivel 200
            if($response->ok()){
                //Tudo ok?
                if($body->status == 'sucesso'){
                    //Conta criada com sucesso.
                    return redirect()->back()
                        ->with(["alertaSucesso" => "O coordenador foi alterado"]);
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
        dd($request->all());
    }

    public function colaboradores(Request $request){
        /** Obtendo o Departamentos **/
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/departamentos/".$request->route('id_departamento')."/?exibir=completo");
        $body = json_decode($response->body());
        $dados['departamento'] = $body->dados;
        /** Obtendo Colaboradores **/
        $response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/colaboradores/");
        $body = json_decode($response->body());
        $dados['colaboradores'] = $body->dados;

        return view('cliente.departamentos.colaboradores',$dados);
    }
}
