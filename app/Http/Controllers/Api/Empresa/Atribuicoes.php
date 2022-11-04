<?php

namespace App\Http\Controllers\Api\Empresa;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\AtribuicaoRepository;
use App\Http\Requests\AtribuicaoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use laravelApiHelpers\ResponseHelper;

class Atribuicoes extends Controller
{
    public function criar(AtribuicaoRequest $request)
    {

        try {
            $attr = $this->repository->store($request);
            //Retornar
            return ResponseHelper::sucessoAcao("Atribuição criada com sucesso.");
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    public function salvar(Request $request, $id_att)
    {
        /** Atualizar Atribuição **/
        /** Validando **/
        \Validator::validate($request->all() + ['id_att' => $id_att], [
            'descricao' => 'required',
            'id_att' => 'required|exists:regs_atribuicoes,id'
        ]);

        try {
            $att = $this->repository->update($request->all(), $id_att);
            return ResponseHelper::sucessoAcao("Atribuição salva com sucesso.", $att);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }

    }

    public function listar(Request $request)
    {
        /** Listar **/
        $data = $this->repository->all();
        //Retornando
        return ResponseHelper::sucessoObter($data['lista'], $data['filtro'], "att_04", "Atribuições obtidas com sucesso.");
    }

    public function remover(Request $request, $id_att)
    {
        /** Validar **/
        \Validator::validate(['id' => $id_att], ['id' => 'required|string|size:36|exists:regs_atribuicoes,id']);
        try {
            $this->repository->delete($id_att);
            return ResponseHelper::sucessoAcao("Atribuição removida com sucesso.", [], "attr_06");
        } catch (\Exception $exception) {
            DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }


    }

    protected $repository;

    public function __construct(AtribuicaoRepository $atribuicaoRepository)
    {
        $this->repository = $atribuicaoRepository;
    }
}
