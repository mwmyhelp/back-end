<?php

namespace App\Http\Repositories;

use App\Models\File;
use Illuminate\Http\UploadedFile;

class FileRepository extends BaseRepository
{
	public function __construct(File $model)
	{
		parent::__construct($model);
	}

	function delete($id)
	{
		$file = $this->model->findOrFail($id);
		$name = $file->name;
		File::deleteUploadFile($name);
		return parent::delete($id);
	}

	function updateFile(UploadedFile $newFile, $id)
	{
		$file = $this->model->findOrFail($id);
		$name = $file->name;
		File::deleteUploadFile($name);
		$data = File::uploadFile($newFile);
		$file->fill($data);
		$file->save();
		return $file;
	}

	function downloadFile($id)
	{
		$file = $this->model->findOrFail($id);
		$data = $file->getUploadFile();
		return compact('data', 'file');
	}

	function storeFile(UploadedFile $file)
	{
		$data = $this->model->storeFile($file);
		return $data;
	}
}
