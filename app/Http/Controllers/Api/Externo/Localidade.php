<?php

namespace App\Http\Controllers\Api\Externo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use laravelApiHelpers\ResponseHelper;

class Localidade extends Controller
{
    public function cidadePorCep(Request $request, $cep)
    {
        /** Busca uma cidade pelo CEP dela **/
        //Validar Request
        Validator::validate(['cep' => $cep], [
            'cep' => 'required|string|max:11'
        ]);
        //Obter cep
        $info = $this->consultarCep($cep);
        //Obter a cidade pelo IBGE
        if ($info) {
            return ResponseHelper::sucessoAcao("Cidade localizada", $info);
        } else {
            return ResponseHelper::aviso("O CEP não corresponde a nenhuma cidade registrada no IBGE", 'end01');
        }

    }

    public function consultarCep($cep){
        //Obter cep
        $cep = preg_replace('/[^0-9]/', '', $cep);
        //Validar novamente o CEP
        Validator::validate(['cep' => $cep],[
            'cep' => 'required|numeric|digits:8'
        ]);

        //Abrir requisição CURL
        $url = "http://viacep.com.br/ws/".$cep."/json/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        $json = json_decode($output,true);
        curl_close($ch);
        //Obter a cidade pelo IBGE
        if(isset($json['ibge'])){
            return $json;
        }else{
            return false;
        }
    }
}
