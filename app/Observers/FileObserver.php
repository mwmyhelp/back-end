<?php

namespace App\Observers;

use App\Models\File;

class FileObserver
{
	public function created(File $file)
	{
		$file->created_by = auth()->user()->id;
		$file->save();
	}

}
