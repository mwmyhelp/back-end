<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper as R;
use App\Http\Repositories\FileRepository;
use App\Http\Requests\File\Create;
use App\Http\Requests\File\CreateRequest;
use Illuminate\Http\Request;

class FileController extends Controller
{
	/**
	 * @var FileRepository
	 */
	protected $repository;

	public function __construct(FileRepository $repository)
	{
		$this->repository = $repository;
	}

	public function storeFile(CreateRequest $request)
	{
		$data = [];
		$files = $request->allFiles();
//		$name = $request->name;
//		$description = $request->description;
//		$id_doc = $request->id_doc;

		foreach ($files as $key => $file) {
			if (is_array($file)) {
				foreach ($file as $item) {
					$tempData = $this->repository->storeFile($item);
					array_push($data, $tempData);
				}
			} else {
				$tempData = $this->repository->storeFile($file);
				array_push($data, $tempData);
			}
		}
		return R::data($data);
	}

	public function show($id)
	{
		$data = $this->repository->get($id);
		return R::data($data);
	}

	public function index($bee_conta_id)
	{
		$request = request()->all();
		$find = array_merge(['bee_conta_id' => $bee_conta_id], $request);
		$data = $this->repository->search($find, false, 10);
		return R::data($data);
	}

	public function destroy($id)
	{
//		$data = $this->repository->get($id);
//		return R::m($data);
	}

	public function info($bee_conta_id)
	{
		return $bee_conta_id;
	}

	public function downloadFile(Request $request, $id)
	{
		$data = $this->repository->downloadFile($id);
		return R::download($data);
	}
}
