<?php
namespace App\Http\Requests\File;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
	use ResponseJson;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 */
	public function rules()
	{
		$rules = [
			'file' => 'required|mimes:jpg,bmp,png,mp4,mov,ogg,qt,avi,docx,doc,pdf,xls,xlsx,pptx,ppt |max:5000',
			'name' => 'required',
			'description' => 'required',
			'id_doc' => 'required|exists:bee_doc,id',
		];

		return $rules;
	}
}
