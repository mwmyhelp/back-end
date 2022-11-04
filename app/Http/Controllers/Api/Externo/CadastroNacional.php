<?php

namespace App\Http\Controllers\Api\Externo;

use App\Http\Controllers\Api\Externo\Localidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use laravelApiHelpers\FormatHelper;
use laravelApiHelpers\ResponseHelper;

class CadastroNacional extends Controller
{
    public function consultarCnpj(Request $request){
        \Validator::validate(['cnpj' => $request->route('cnpj')],['cnpj' => 'required|cnpj']);
        //Obtendo o CNPJ
        $cnpj = preg_replace('/[^0-9]/', '', $request->route('cnpj'));
        //Gerando a URL
        $url = "http://www.receitaws.com.br/v1/cnpj/".$cnpj;
        //Requisição
        $res = Http::withOptions(['verify'=>false])->get($url);
        if($res->successful()){
            //Criando Array
            $arr = json_decode($res->body());
            //Testando resultado
            if($arr->status == "ERROR"){
                return ResponseHelper::aviso("O CNPJ não existe na base de dados da receita.",'cnc-01');
            }
            //Temos o CEP, faremos uma consulta a esse CEP
            $controller = new Localidade();
            $info = $controller->consultarCep($arr->cep);
            //Adicionando dados da cidade
            $arr->ibge_cidade = $info['ibge'];
            //Alterando o CEP
            $arr->cep = FormatHelper::apenasNumeros($arr->cep);
            //Retornando
            return ResponseHelper::sucessoObter($arr);
        }else{
            return ResponseHelper::aviso("O CNPJ não pode ser verificado pela API",'cnc-02');
        }
    }

}
