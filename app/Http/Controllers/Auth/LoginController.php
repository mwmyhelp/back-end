<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use laravelApiHelpers\ResponseHelper;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $cpf = $request->cpf;
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);

        $usuario = $request->cpf;

        $user = User::where('cpf',preg_replace('/[^0-9.]+/', '', $cpf))->orWhere('username',$usuario)->first();

        if (Hash::check($request->password, $user->password)) {
            // Logando
            \Auth::login($user);
            return redirect(route('filemanager.base_route'));
        }else{
            return redirect()->back()->withErrors("Erro no login");
        }
    }

}
