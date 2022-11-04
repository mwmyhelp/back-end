<?php

namespace App\Http\Middleware;

use App\Models\Empresa\Empresa;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostProcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** Aqui verificamos o tipo de usuário logado, e garantimos a sessão com o ID da empresa */

        return $next($request);
    }
}
