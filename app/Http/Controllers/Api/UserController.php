<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\User\ResetRequest;

class UserController extends Controller
{
	/**
	 * @var UserRepository
	 */
	protected $repository;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	public function alterarSenha(ResetRequest $request)
	{
		$senha = $this->repository->alterarSenha($request->input('old_password'), $request->input('new_password'));
		return ResponseHelper::success("Senha alterada com sucesso", compact('senha'));
	}
}
