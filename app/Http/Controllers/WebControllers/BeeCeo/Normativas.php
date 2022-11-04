<?php

namespace App\Http\Controllers\WebControllers\BeeCeo;

use App\Http\Controllers\Controller;
use App\Models\CEO\Normativa;
use App\Models\Empresa\Departamento;
use Illuminate\Http\Request;

class Normativas extends Controller
{

    /** ↓↓↓ Nova Estrutura */
    public function index(Request $request){
        //Chamar módulo de Normativas
        return view('beeapp.modulos.normativas');
    }

}
