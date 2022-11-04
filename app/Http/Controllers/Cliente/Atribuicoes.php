<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AtribuicaoRepository;
use App\Http\Requests\AtribuicaoRequest;
use Illuminate\Http\Request;

class Atribuicoes extends Controller
{
    private $repository;

    public function __construct(AtribuicaoRepository $atribuicaoRepository)
    {
        $this->repository = $atribuicaoRepository;
    }

    public function adicionar(AtribuicaoRequest $request)
    {
        //        TODO ajustar o front para enviar os campos corretos
        //        Preparando os dados
        //        $dados = $request->all();
        //        //Preparar dados
        //        $data = [
        //            'descricao' => $request->input('descricao'),
        //            'anexar_id' => $request->input('id_colab'),
        //            'anexar_em' => $request->input('tipo')
        //        ];


        try {
            $attr = $this->repository->store($request);
            //Retornar
            return redirect()->back()->with(["alertaSucesso" => "Atribuição adicionada com sucesso!"]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu." . $exception->getMessage()])->withInput();
        }

    }

    public function editar(Request $request)
    {
        try {
            $attr = $this->repository->update($request->all(), $request->input('id'));
            //Retornar
            return redirect()->back()->with(["alertaSucesso" => "Atribuição alterada com sucesso!"]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu." . $exception->getMessage()])->withInput();
        }
    }

    public function remover(Request $request)
    {
        //Preparando os dados
        $id = $request->route('id_att');

        try {
            $this->repository->delete($id);
            //Retornar
            return redirect()->back()->with(["alertaSucesso" => "Atribuição alterada com sucesso!"]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with(['alertaErro' => "Um erro desconhecido aconteceu." . $exception->getMessage()])->withInput();
        }

    }
}
