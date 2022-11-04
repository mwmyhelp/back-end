<?php

namespace App\Models;

use App\Models\CEO\BeeDoc;
use App\Models\Hive\BeeConta;
use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'path',
		'type',
		'extension',
		'size',
		'bee_conta_id',
		'bee_doc_id',
	];

	public static function deleteUploadFile($file_name)
	{
		$disk = Storage::disk('local')->delete($file_name);
		return $disk;
	}

	public function beeDoc()
	{
		return $this->belongsTo(BeeDoc::class);
	}

	public function beeConta()
	{
		return $this->belongsTo(BeeConta::class);
	}

	public function storeFile(UploadedFile $file)
	{
		$data = self::uploadFile($file);
		return $this->create($data);
	}

	public static function uploadFile(UploadedFile $file): array
	{
		$disk = Storage::disk('local');
		$size = $file->getSize();
		$type = $file->getMimeType();
		$extension = $file->getClientOriginalExtension();
//		$name = $file->getClientOriginalName();
		$name = request()->name;
		$description = request()->description;
		$bee_doc_id = request()->id_doc;

		$bee_conta_id = BeeDoc::findOrFail($bee_doc_id)->bee_conta;

		$file_name = mt_rand() . $file->getClientOriginalName();
		$path = "$bee_conta_id/$file_name";

		$target = $disk->put($path, $file->getContent());

		if ($target) {
			return compact('size', 'extension', 'bee_doc_id', 'type', 'name', 'description', 'path', 'bee_conta_id');
		}
		return abort("Falha ao salvar o arquivo", 500);
	}

	public function getUploadFile()
	{
		$disk = Storage::disk('local');
		$exists = $disk->exists($this->path);
		if ($exists) {
			$content = $disk->get($this->path);
		} else {
			abort(404, "Arquivo não encontrado");
		}
		return $content;
	}
}
