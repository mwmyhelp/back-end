<?php

namespace App\Http\Controllers\WebControllers\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Colaboradores extends Controller
{
    /** Abre o módulo de gestão de colaboradores **/
    public function gestao(Request $request){
        return view('beeapp.modulos.colaboradores_gestao');
    }

    /** Abre o módulo de informações de colaborador **/
    public function info(Request $request){
        return view('beeapp.modulos.colaboradores_info');
    }

}
