<?php

namespace App\Http\Controllers\WebControllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcessoArquivos extends Controller
{
    public function acessar(Request $request)
    {
        $file = "uploaded/".$request->route('caminho');
        /** Verificar se o arquivo existe **/
        if (Storage::disk("digitalocean")->has($file)) {
            return Storage::disk("digitalocean")->response($file);
        } else {
            return abort(404);
        }
    }

    public function baixar(Request $request)
    {
        /** Verificar se o arquivo existe **/
        if (Storage::has($request->route('caminho'))) {
            return Storage::download($request->route('caminho'));
        } else {
            return abort(404);
        }
    }
}

