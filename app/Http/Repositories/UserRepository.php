<?php

namespace App\Http\Repositories;

use App\Helpers\ResponseHelper;
use App\Models\Hive\PessoaFisica;
use App\Models\Hive\PessoaJuridica;
use App\Models\User;
use App\Notifications\SenhaTemporariaConta;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
	public function __construct(User $model)
	{
		parent::__construct($model);
	}

	public function createUserBeeConta(PessoaJuridica $empresa, PessoaFisica $pessoa)
	{
		$senha_temporaria = rand(11111111, 99999999);
		$token = sha1(rand(0, 999) . time());

		//Criando a usuário
		$usuario = self::create([
			'name' => $pessoa->nome,
			'tipo' => 'admin_empresa',
			'email' => $empresa->email,
			'cpf' => $pessoa->cpf,
			'password' => Hash::make($senha_temporaria),
			'unique_token' => sha1(rand(0, 999) . time())
		]);

		$usuario->notify(new SenhaTemporariaConta($usuario->email, $senha_temporaria));

		return $usuario;
	}

	/**
	 * Procura um usuário por e-mail, id ou cpf
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	function get($data)
	{
		$user = User::orWhere('email', $data)
			->orWhere('cpf', preg_replace("/[^0-9]/", "", $data))
			->orWhere('id', $data)
			->firstOrFail();
		return $user;
	}

	/**
	 * Devolve o nome do usuário e imagem caso o usuário tenha cadastro
	 *
	 * @param $cpf
	 *
	 * @return mixed
	 */
	function checkUser($cpf)
	{
		$cpf = preg_replace("/[^0-9]/", "", $cpf);

		if ($cpf) {
			return $this->model->select('name', 'imagem_perfil')->where('cpf', '=', $cpf)->first();
		}

		return false;
	}

	function alterarSenha($old_password, $new_password)
	{
		if (Hash::check($old_password, auth()->user()->password)) {
			$user = auth()->user();
			$user->password = Hash::make($new_password);
			$user->save();
			return $new_password;
		}
		ResponseHelper::abort(401, "Falha!");
		return false;
	}
}
