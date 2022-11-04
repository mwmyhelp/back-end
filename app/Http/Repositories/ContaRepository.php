<?php

namespace App\Http\Repositories;

use App\Helpers\ResponseHelper;
use App\Models\Hive\BeeConta;
use App\Models\Hive\BeeEndereco;
use App\Models\Hive\PessoaFisica;
use App\Models\Hive\PessoaJuridica;
use App\Models\User;

class ContaRepository extends BaseRepository
{
	public function __construct(BeeConta $model)
	{
		parent::__construct($model);
	}

	function all()
	{
		switch (request()->get('exibir')) {
			case "removidos" :
				$lista = BeeConta::with('pessoa')->onlyTrashed()->get();
				$filtro = ['exibir' => 'removidos'];
				break;

			default:
				$lista = BeeConta::with('pessoa')->get();
				$filtro = [];
				break;
		}

		return [
			'lista' => $lista,
			'filtro' => $filtro
		];
	}

	/**
	 * @param array $conta
	 * @param PessoaJuridica $empresa
	 * @param BeeEndereco $endereco
	 * @param PessoaFisica $pessoa
	 * @param User $usuario
	 *
	 * @return array|mixed
	 */
	function createBeeConta($conta, PessoaJuridica $empresa, BeeEndereco $endereco, PessoaFisica $pessoa, User $usuario)
	{
		$imagem_perfil = '';
		//Imagem Perfil
		if (request()->hasFile('conta.imagem_perfil')) {
			//Fazer Upload da Imagem
			$arquivo = request()->file('conta.imagem_perfil')->store('avatar');
			$imagem_perfil = $arquivo;
		}

		$conta = self::create([
			'pessoa_type' => get_class($empresa),
			'pessoa_id' => $empresa->id,
			'imagem_perfil' => $imagem_perfil,
			'bee_conta' => sha1(rand(0, 999) . time()),
			'id_usuario' => $usuario->id,
			'id_responsavel' => $pessoa->id,
			'id_endereco' => $endereco->id,
			'plano_selecionado' => $endereco->id,
			'configuracoes' => json_encode(request()->get('configuracoes')),
			'situacao' => 'A'
		]);

		$usuario->bee_conta = $conta->id;
		$usuario->save();

		return $conta;
	}

	function assumir($user_id)
	{
		/** Verificar se o usuário é Admin **/
		if (\Auth::user()->tipo == "admin") {
			//Obter usuário pelo UUID
			$user = \App\Models\User::findOrFail($user_id);
			//Substituir a BeeConta do usuário atual
			$atual = \Auth::user();
			$atual->bee_conta = $user->bee_conta;
			//Salvar
			$atual->save();
			return $atual->bee_conta;
		}
		ResponseHelper::abort(401, 'Somente usuários administradores podem assumir');
		return;
	}
}
