<?php

namespace App\Http\Controllers\Api\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\BeeDoc;
use Illuminate\Http\Request;
use laravelApiHelpers\ResponseHelper;

class BeeDocController extends Controller
{
    /** Obter Documento */
    public function obter(Request $request, $id_doc){
        /** Obter uma BeeDoc baseado no ID **/
        //Validando
        \Validator::validate(
            ['id' => $id_doc],
            [
                'id' => 'required|string|size:36|exists:bee_doc,id',
            ]
        );

        /** -- */
        // Get the Doc Data
        $doc = BeeDoc::where('id',$id_doc)->where('bee_conta',\Auth::user()->bee_conta)->first();
        // Load 'Autor'
        $doc->load('autor');
        // Check if file exists
        if(\Storage::disk("digitalocean")->exists("beedocs/".$doc->bee_conta."/preversion/".$doc->id.".bap")){
            // "Change the 'conteudo_publicado' with the Loaded File Data
            $data = \Storage::disk("digitalocean")->get("beedocs/".$doc->bee_conta."/preversion/".$doc->id.".bap");
        }else{
            // Empty value
            $data = "";
        }

        // Update the data
        $doc->conteudo_publicado = $data;
        $doc->conteudo_edicao = $data;
        /** -- */

        //Retornando
        return ResponseHelper::sucessoObter($doc);
    }

    /** Definir Emoji */
    public function definirEmoji(Request $request, $id_doc){
        /** Obter uma BeeDoc baseado no ID **/
        //Validando
        \Validator::validate(
            ['id' => $id_doc]+$request->all(),
            [
                'id' => 'required|string|size:36|exists:bee_doc,id',
                'emoji' => 'required'
            ]
        );
        //Obtendo
        $doc = BeeDoc::where('id',$id_doc)->where('bee_conta',\Auth::user()->bee_conta)->with(['autor:id,name,imagem_perfil'])->firstOrFail();
        //Definindo o Emoji
        $doc->emoji = $request->input('emoji');
        //Salvando
        $doc->save();
        //Retornando
        return ResponseHelper::sucessoAcao("Emoji definido",$doc->emoji);
    }

    /** Renomear */
    public function renomear(Request $request, $id_doc){
        /** Obter uma BeeDoc baseado no ID **/
        //Validando
        \Validator::validate(
            ['id' => $id_doc]+$request->all(),
            [
                'id' => 'required|string|size:36|exists:bee_doc,id',
                'titulo' => 'required'
            ]
        );
        //Obtendo
        $doc = BeeDoc::where('id',$id_doc)->where('bee_conta',\Auth::user()->bee_conta)->with(['autor:id,name,imagem_perfil'])->firstOrFail();
        //Renomeando
        $doc->titulo = $request->input('titulo');
        //Salvando
        $doc->save();
        //Retornando
        return ResponseHelper::sucessoAcao("Documento Renomeado",$doc->titulo);
    }

    /** Salvar Conteúdo */
    public function salvar(Request $request, $id_doc){
        /** Obter uma BeeDoc baseado no ID **/
        //Validando
        \Validator::validate(
            ['id' => $id_doc]+$request->all(),
            [
                'id' => 'required|string|size:36|exists:bee_doc,id',
                'conteudo' => 'required'
            ]
        );
        //Obtendo
        $doc = BeeDoc::where('id',$id_doc)->where('bee_conta',\Auth::user()->bee_conta)->with(['autor:id,name,imagem_perfil'])->firstOrFail();
        // Storing Data
        $store = \Storage::disk("digitalocean")->put("beedocs/".$doc->bee_conta."/preversion/".$doc->id.".bap", $request->input('conteudo'));
        //Salvando o conteudo
        $doc->conteudo_edicao = 'deprecated';
        $doc->conteudo_publicado = 'deprecated';
        //Salvando
        $doc->save();
        //Retornando
        return ResponseHelper::sucessoAcao("Documento Salvo",$doc->id);
    }
}
