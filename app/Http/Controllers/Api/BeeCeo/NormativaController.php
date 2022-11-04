<?php

namespace App\Http\Controllers\Api\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\BeeDoc;
use App\Models\CEO\Normativa;
use App\Models\Empresa\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use laravelApiHelpers\ResponseHelper;

class NormativaController extends Controller
{
    public function criar(Request $request){
        /** Criando uma Normativa */
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
            $doc->tipo = 'normativa';
            //Qual o título do documento?
            $doc->titulo = $request->input('titulo');
            //Status - Como é uma normativa, já vai estar ativo.
            $doc->status = 'A';
            /**
             * URL Capa -> Vazio
             * Emoji -> Vazio
             * Conteúdo Publicado e Conteúdo em Edição -> Vazio
             */
            //Salvando o Doc
            $doc->save();
            /** Construindo a normatvia */
            $normativa = new Normativa();
            //Preenchendo os dados
            //Qual a bee conta?
            $normativa->bee_conta = \Auth::user()->bee_conta;
            //Qual o documento referencia
            $normativa->id_documental = $doc->id;
            //Qual o código
            $normativa->codigo = Normativa::where('bee_conta',Auth::user()->bee_conta)->max('codigo');
            if(is_null($normativa->codigo)){
                $normativa->codigo = 1;
            }else{
                $normativa->codigo++;
            }
            /** Por enquanto não será aplicada em lugar algum */
            //Salvando a normativa
            $normativa->save();
            //Commit no BD
            \DB::commit();
            //Retornando o resultado
            return ResponseHelper::sucessoAcao("Normativa criada com sucesso.", $normativa);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function listar(Request $request){
        /**
         * Listar as normativas
         */
        $normativas = Normativa::query();
        $normativas->where('bee_conta',Auth::user()->bee_conta);
        if($request->has('termo')){
            $normativas->whereHas('beedoc', function($q) use ($request){
                $q->where('titulo','LIKE','%'.$request->input('termo').'%');
            });
        }
        //Aplicado?
        if($request->has('aplicada')){
            $normativas->where(function($q) use ($request){
                foreach($request->input('aplicada') as $apl){
                    $q->orWhere('aplicada_em','LIKE','%'.$apl.'%');
                }
            });
        }
        $normativas->orderBy('codigo','ASC');
        $lista = $normativas->get();
        return ResponseHelper::sucessoObter($lista);
    }

    public function atualizarAplicacao(Request $request){
        /** Aplicar a normativas em */
        $normativa = Normativa::where('bee_conta',Auth::user()->bee_conta)->where('id',$request->route('id_normativa'))->firstOrFail();
        $normativa->aplicada_em = json_encode($request->input('aplicar_em'));
        $normativa->save();
        return ResponseHelper::sucessoAcao("Atualizado");
    }

    public function arquivar(Request $request){
        /** Aplicar a normativas em */
        $normativa = Normativa::where('bee_conta',Auth::user()->bee_conta)->where('id',$request->route('id_normativa'))->firstOrFail();
        //Arquivar
        $normativa->delete();
        return ResponseHelper::sucessoAcao("Arquivado");
    }
}
