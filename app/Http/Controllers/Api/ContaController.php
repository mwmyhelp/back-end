<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Repositories\ContaRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Conta\AssumirRequest;

class ContaController extends Controller
{
	/**
	 * @var UserRepository
	 */
	protected $repository;

	public function __construct(ContaRepository $repository)
	{
		$this->repository = $repository;
	}

	public function assumir(AssumirRequest $request)
	{
		$conta = $this->repository->assumir($request->input('user_id'));
		return ResponseHelper::success("Conta assumida", compact('conta'));
	}
}
