<?php

namespace App\Http\Controllers\Api\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\BeeDoc;
use App\Models\CEO\Procedimento;
use App\Models\Empresa\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use laravelApiHelpers\ResponseHelper;

class ProcedimentoController extends Controller
{
    public function criar(Request $request){
        /** Criando uma Procedimento */
        $request->validate(['titulo' => 'required|string|min:3']);
        //Iniciar Transação
        \DB::beginTransaction();
        try {
            /** Contruindo o Documento Referente */
            $doc = new BeeDoc();
            //Quem criou?
            $doc->created_by = \Auth::id();
            //Qual a Bee Conta?
            $doc->bee_conta = \Auth::user()->bee_conta;
            //Qual tipo do documento?
            $doc->tipo = 'procedimento';
            //Qual o título do documento?
            $doc->titulo = $request->input('titulo');
            //Status - Como é uma procedimento, já vai estar ativo.
            $doc->status = 'A';
            /**
             * URL Capa -> Vazio
             * Emoji -> Vazio
             * Conteúdo Publicado e Conteúdo em Edição -> Vazio
             */
            //Salvando o Doc
            $doc->save();
            /** Construindo o procedimento */
            $procedimento = new Procedimento();
            //Preenchendo os dados
            //Qual a bee conta?
            $procedimento->bee_conta = \Auth::user()->bee_conta;
            //Qual o documento referencia
            $procedimento->id_documental = $doc->id;
            //Qual o código
            $procedimento->codigo = Procedimento::where('bee_conta',Auth::user()->bee_conta)->max('codigo');
            if(is_null($procedimento->codigo)){
                $procedimento->codigo = 1;
            }else{
                $procedimento->codigo++;
            }
            /** Por enquanto não será aplicada em lugar algum */
            //Salvando a procedimento
            $procedimento->save();
            //Commit no BD
            \DB::commit();
            //Retornando o resultado
            return ResponseHelper::sucessoAcao("Procedimento criado com sucesso.", $procedimento);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function listar(Request $request){
        /**
         * Listar as procedimentos
         */
        $procedimentos = Procedimento::query();
        $procedimentos->where('bee_conta',Auth::user()->bee_conta);

        if($request->has('termo')){
            $procedimentos->whereHas('beedoc', function($q) use ($request){
                $q->where('titulo','LIKE','%'.$request->input('termo').'%');
            });
        }
        //Aplicado?
        if($request->has('aplicada')){
            $procedimentos->where(function($q) use ($request){
                foreach($request->input('aplicada') as $apl){
                    $q->orWhere('aplicada_em','LIKE','%'.$apl.'%');
                }
            });
        }
        $procedimentos->orderBy('codigo','ASC');
        // Make Hidden
        $lista = $procedimentos->get();

        foreach($lista as $key => $item){
            unset($lista[$key]->beedoc->conteudo_publicado);
            unset($lista[$key]->beedoc->conteudo_edicao);
        }

        //$lista = $lista->makeHidden(['beedoc.conteudo_publicado','beedoc.conteudo_edicao']);


        return ResponseHelper::sucessoObter($lista);
    }

    public function atualizarAplicacao(Request $request){
        /** Aplicar a procedimentos em */
        $procedimento = Procedimento::where('bee_conta',Auth::user()->bee_conta)->where('id',$request->route('id_procedimento'))->firstOrFail();
        $procedimento->aplicada_em = json_encode($request->input('aplicar_em'));
        $procedimento->save();
        return ResponseHelper::sucessoAcao("Atualizado");
    }

    public function arquivar(Request $request){
        /** Aplicar a procedimentos em */
        $procedimento = Procedimento::where('bee_conta',Auth::user()->bee_conta)->where('id',$request->route('id_procedimento'))->firstOrFail();
        //Arquivar
        $procedimento->delete();
        return ResponseHelper::sucessoAcao("Arquivado");
    }
}
