<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper as R;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $repository;

	public function show($id)
	{
		$data = $this->repository->get($id);
		return R::data($data);
	}

	public function destroy($id)
	{
		$this->repository->delete($id);
		return R::success($this->msgDelete);
	}
}
