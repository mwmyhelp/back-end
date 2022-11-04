<?php

namespace App\Http\Repositories;

use App\Models\Empresa\Atribuicao;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\Colaborador;
use Illuminate\Support\Facades\Auth;

class AtribuicaoRepository extends BaseRepository
{
    public function __construct(Atribuicao $model)
    {
        parent::__construct($model);
    }

    function all()
    {
        $request = request();
        /** Listar **/
        switch (request()->get('anexo_tipo')) {
            case "colaborador" :
                $lista = $this->model->where('bee_conta', Auth::user()->bee_conta)->where('anexo_type', get_class(new Colaborador()))->where('anexo_id', $request->get('anexo_id'))->orderBy('cod')->get();
                $filtro = ['anexo_tipo' => 'colaborador'];
                $filtro = ['anexo_id' => $request->get('anexo_id')];
                break;

            case "cargo" :
                $lista = $this->model->where('bee_conta', Auth::user()->bee_conta)->where('anexo_type', get_class(new Cargo()))->where('anexo_id', $request->get('anexo_id'))->orderBy('cod')->get();
                $filtro = ['anexo_tipo' => 'cargo'];
                $filtro = ['anexo_id' => $request->get('anexo_id')];
                break;

            default:
                report("Erro na listagem");
        }

        return ['lista' => $lista, 'filtro' => $filtro];
    }

    function store($request)
    {
        //Iniciando Transação
        \DB::beginTransaction();
        /** Verificando em quem vamos anexar o item **/
        if ($request->input('anexar_em') == 'colaborador') {
            //Anexar em um colaborador
            //Validar o anexar_id
            \Validator::validate($request->all(), [
                'anexar_id' => 'required|exists:empresa_colaboradores,id',
            ]);
            //Verificar se o colaborador realmente pertence a mesma beeconta
            $colab = Colaborador::find($request->input('anexar_id'));
            if ($colab->bee_conta != Auth::user()->bee_conta) {
                //Erro fatal.
                report("Você não pode fazer essa ação.");

            }
            //Criar a nova atribuição
            $attr = new Atribuicao();
            $attr->bee_conta = Auth::user()->bee_conta;
            $attr->descricao = $request->input('descricao');
            $attr->anexo_type = get_class($colab);
            $attr->anexo_id = $colab->id;
            //Obtendo o Maior numero de Attr
            $attr->cod = Atribuicao::where('bee_conta', $colab->bee_conta)->max('cod') + 1;
            //Salvar
            $attr->save();

            //Commit
            \DB::commit();

            //Retornar
            return $attr;

        } else if ($request->input('anexar_em') == 'cargo') {
            //Anexar em um cargo
            //Validar o anexar_id
            \Validator::validate($request->all(), [
                'anexar_id' => 'required|exists:empresa_cargos,id',
            ]);
            //Verificar se o cargo realmente pertence a mesma beeconta
            $cargo = Cargo::find($request->input('anexar_id'));
            if ($cargo->bee_conta != Auth::user()->bee_conta) {
                //Erro fatal.
                report("Você não pode fazer essa ação. Bee-Acc");

            }
            //Criar a nova atribuição
            $attr = new Atribuicao();
            $attr->bee_conta = Auth::user()->bee_conta;
            $attr->descricao = $request->input('descricao');
            $attr->anexo_type = get_class($cargo);
            $attr->anexo_id = $cargo->id;
            //Obtendo o Maior numero de Attr
            $attr->cod = Atribuicao::where('bee_conta', $cargo->bee_conta)->max('cod') + 1;
            //Salvar
            $attr->save();

            //Commit
            \DB::commit();

            //Retornar
            return $attr;
        } else {
            //Erro fatal.
            report("Você não pode fazer essa ação.");
        }

    }

    function update($data, $id)
    {
        $att = $this->model->findOrFail($id);

        //Validando a BeeConta
        if ($att->bee_conta != Auth::user()->bee_conta) {
            report("Você não pode alterar essa atribuição.");
        }

        $att->descricao = $data['descricao'];
        $att->save();

        return $att;
    }

    function delete($id)
    {

        /** Obter a Atribuição **/
        $att = $this->model->where('id', $id)->where('bee_conta', Auth::user()->bee_conta)->firstOrFail();
        //Removendo
        $att->delete();

    }

}
