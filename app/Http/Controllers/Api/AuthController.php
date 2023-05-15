<?php

namespace App\Http\Controllers\Api;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\Auth\ConsultaUserRequest;
use App\Http\Requests\Auth\LogarRequest;
use App\Models\Hive\PessoaJuridica;
use App\Models\User;
use App\Notifications\SenhaTemporariaConta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use laravelApiHelpers\FormatHelper;
use laravelApiHelpers\ResponseHelper;
use Mockery\Exception;

class AuthController extends Controller
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function registrar(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'tipo' => 'admin',
            'password' => Hash::make($validatedData['password']),
            'unique_token' => sha1(rand(0, 999) . time())
        ]);

        return ResponseHelper::sucessoAcao("Usuário criado com sucesso", $user, "auth_01");

    }

    public function logar(LogarRequest $request)
    {
        dd('oi');

        /** Substituição pq... bugou... não sei rsrs */
        //if (!Auth::attempt($request->only('cpf', 'password'))) {
        //    return response()->json([
        //        'message' => 'Dados de login inválidos'
        //    ], 401);
        // }

        $user = $this->repository->get($request->cpf);
        if (Hash::check($request->password, $user->password)) {

            //Verificando se o usuário está ativo pelo campo role
            if ($user->role == 'inactive_user') {
                return ResponseHelper::erroGeral("Usuário inativo.");
            }

            //Gerando o token do usuário
            $token = $user->createToken('auth_token')->plainTextToken;
            //Retornando
            return ResponseHelper::sucessoAcao("Usuário logado com sucesso.", [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], "auth_01");
        }

        return ResponseHelper::erroGeral("Dados inválidos.");

    }

    public function consultarUsuario(ConsultaUserRequest $request)
    {
        try {
            $usuario = $this->repository->checkUser($request->get('cpf'));
            if ($usuario) {
                return ResponseHelper::sucessoAcao('Usuário', $usuario);
            }
        } catch (Exception $e) {
            return ResponseHelper::exception($e->getMessage(), 'Erro desconhecido');
        }
        return ResponseHelper::erroGeral('Nenhum usuário foi encontrado');
    }

    public function consultarBeeConta(Request $request)
    {
        //Obter CNPJ e consultar se existe BeeConta com esse CNPJ
        $validado = $request->validate(['cnpj' => 'cnpj|required']);
        try {
            $busca = PessoaJuridica::where('cnpj', FormatHelper::apenasNumeros($validado['cnpj']))->first();
            if ($busca) {
                return ResponseHelper::aviso("ja_existe", 'ja_existe');
            } else {
                return ResponseHelper::aviso("nao_existe", 'nao_existe');
            }
        } catch (Exception $e) {
            return ResponseHelper::exception($e->getMessage(), 'Erro desconhecido');
        }
    }

    /** ↓↓↓ Novo Método */
    public function alterarSenha(Request $request)
    {
        /** Altera a senha do usuário logado **/
        $request->validate(
            [
                'senha' => 'required|string|min:6'
            ]
        );
        /** Obter usuário logado */
        $user = Auth::user();
        //Alterar senha
        $user->password = Hash::make($request->input('senha'));
        //Salvar
        $user->save();
        //Retornar
        return ResponseHelper::sucessoAcao("Senha alterada com sucesso!");
    }

    /** ↓↓↓ Novo Médoto */
    public function resetarSenha(Request $request)
    {
        /** Altera a senha do usuário logado **/
        $request->validate(
            [
                'usuario' => 'required|string|exists:users,id'
            ]
        );
        /** Obter usuário logado */
        $user = User::where('bee_conta',Auth::user()->bee_conta)->where('id',$request->input('usuario'))->firstOrFail();
        //Gerar senha
        $senha_gerada = rand(111111,999999);
        //Alterar senha
        $user->password = Hash::make($senha_gerada);
        $user->acao_obrigatoria = 'troca_senha';
        //Salvar
        $user->save();
        //Notificar
        $msg = "A senha do colaborador foi alterada. A senha de acesso temporária é: ".$senha_gerada.". No primeiro acesso do colaborador, ele deve trocar a senha.";
        if($user->email){
            $user->notify(new SenhaTemporariaConta($user->cpf, $senha_gerada));
            $msg .= "A senha também foi enviada no e-mail informado no cadastro.";
        }
        //Retornar
        return ResponseHelper::sucessoAcao($msg);
    }
}
