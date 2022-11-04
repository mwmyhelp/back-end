<?php

namespace App\Http\Controllers\WebControllers\Gestor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ContaRepository;
use App\Http\Requests\BeeContaRequest;
use Illuminate\Http\Request;

class BeeContaController extends Controller
{
    private $repository;

    public function __construct(ContaRepository $beeContaRepository)
    {
        $this->repository = $beeContaRepository;
    }

    public function index(Request $request)
    {
        /** Módulo Principal de BeeContas */
       return view('beeapp.paginas.beecontas.index');
    }

    public function adicionar(Request $request)
    {
        return view('beeapp.paginas.beecontas.adicionar');
    }

    public function criar(BeeContaRequest $request)
    {
        /** Criando uma Nova Bee Conta **/
        //Preparando os dados

        //TODO esses dados devem vir do front defini eles aqui temporáriamente no entanto não passa na validação da rerquest
        $request->request->add(['opcional' => ['criar_conta' => true]]); //add request
        $request->request->add(['pessoa' => ['tipo' => 'juridica']]); //add request

        $conta = $this->repository->store($request);

        return redirect()->route('gestor.beeconta')->with(["alertaSucesso" => "A beeconta foi criada com sucesso!"]);

    }

    public function assumir(Request $request){
        /** Verificar se o usuário é Admin **/
        if(\Auth::user()->tipo == "admin"){
            //Obter usuário pelo UUID
            $user = \App\Models\User::findOrFail($request->get('uuid'));
            //Substituir a BeeConta do usuário atual
            $atual = \Auth::user();
            $atual->bee_conta = $user->bee_conta;
            //Salvar
            $atual->save();
            //Abrindo a sessão
            \Session::put('ASSUMIR_EMPRESA',true);
            //Redirecionar
            return redirect()->route('inicio');
        }
        return abort(500);
    }
}
