<?php

namespace App\Http\Controllers\Api\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\Diagrama;
use Illuminate\Http\Request;
use laravelApiHelpers\ResponseHelper;

class DiagramaController extends Controller
{
    public function getNumeracao(Request $request){
        /** Retorna o novo numero a ser adicionado **/

        try {
            $cod = Diagrama::where('bee_conta',\Auth::user()->bee_conta)->max('cod');
            return ResponseHelper::sucessoObter([
                'cod' => str_pad(($cod) ? $cod++ : 1, 3, "0", STR_PAD_LEFT)
            ]);
        }catch (\Exception $exception){
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function listar(Request $request){
        /** Listar Diagramas */
        $diagramas = Diagrama::query();
        $diagramas->where('bee_conta',\Auth::user()->bee_conta);
        if($request->has('termo')){
            $diagramas->where('titulo','LIKE','%'.$request->input('termo').'%');
        }
        //Aplicado?
        if($request->has('aplicada')){
            $diagramas->where(function($q) use ($request){
                foreach($request->input('aplicada') as $apl){
                    $q->orWhere('aplicado_em','LIKE','%'.$apl.'%');
                }
            });
        }
        $diagramas->orderBy('cod','ASC');
        $lista = $diagramas->get();
        return ResponseHelper::sucessoObter($lista);
    }

    public function criarDiagrama(Request $request){
        /** Vamos criar um diagrama... sim. poderia usar um request próprio... maaas quero publicar logo kkk */
        $validado = $request->validate([
           'aplicado_em' => 'required|string',
            'titulo' => 'required|string',
            'json' => 'required',
            'descricao' => 'sometimes|nullable|string'
        ]);
        \DB::beginTransaction();
        /** Criando **/
        try {
            $diagrama = new Diagrama();
            $diagrama->bee_conta = \Auth::user()->bee_conta;
            $cod = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->max('cod');
            $diagrama->cod = ($cod) ? $cod + 1 : 1;
            $diagrama->titulo = $validado['titulo'];
            $diagrama->descricao = $validado['descricao'];
            $diagrama->json = $validado['json'];
            $diagrama->aplicado_em = $validado['aplicado_em'];
            $diagrama->save();
            \DB::commit();
            return ResponseHelper::sucessoAcao("Diagrama criado com sucesso", $diagrama);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function obterDiagrama(Request $request, $id_diagrama)
    {
        /** Obter Diagrama */
        \Validator::validate(['id_diagrama' => $id_diagrama], [
            'id_diagrama' => 'required|exists:regs_diagramas,id'
        ]);
        /** Obter apenas se for da minha bee_conta */
        try {
            $diagrama = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_diagrama)->firstOrFail();
            return ResponseHelper::sucessoObter($diagrama);
        } catch (\Exception $exception) {
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function salvarDiagrama(Request $request, $id_diagrama)
    {
        /** Obter Diagrama */
        \Validator::validate(['id_diagrama' => $id_diagrama], [
            'id_diagrama' => 'required|exists:regs_diagramas,id'
        ]);
        $validado = $request->validate([
            'aplicado_em' => 'required|string',
            'titulo' => 'required|string',
            'json' => 'required',
            'descricao' => 'sometimes|nullable|string'
        ]);
        \DB::beginTransaction();
        /** Obter apenas se for da minha bee_conta */
        try{
            $diagrama = Diagrama::where('bee_conta', \Auth::user()->bee_conta)->where('id', $id_diagrama)->firstOrFail();
            //Atualizar
            $diagrama->titulo = $validado['titulo'];
            $diagrama->descricao = $validado['descricao'];
            $diagrama->json = $validado['json'];
            $diagrama->aplicado_em = $validado['aplicado_em'];
            $diagrama->save();
            \DB::commit();
            return ResponseHelper::sucessoAcao("Diagrama Atualizado",$diagrama);
        }catch (\Exception $exception){
            \DB::rollBack();
            return ResponseHelper::exception($exception, $exception->getMessage());
        }
    }

    public function removerDiagrama(Request $request){

    }
}
