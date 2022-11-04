<?php

namespace App\Http\Controllers\WebControllers\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\Procedimento;
use App\Models\Empresa\Departamento;
use Illuminate\Http\Request;

class Procedimentos extends Controller
{

    /** ↓↓↓ Nova Estrutura */
    public function index(Request $request){
        //Chamar módulo de Procedimentos
        return view('beeapp.modulos.procedimentos');
    }

}
