<?php

namespace App\Http\Controllers\WebControllers\BeeCeo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Departamentos extends Controller
{
    /** Abre o módulo principal de departamentos **/
    public function index(Request $request){
        return view('beeapp.modulos.departamentos');
    }
}
