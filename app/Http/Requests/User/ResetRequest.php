<?php

namespace App\Http\Requests\User;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
	 * @return array
	 */
	public function rules()
	{
		return [
			'old_password' => 'required',
			'new_password' => [
				'required',
				'string',
				'min:8',
				'confirmed'
			],
		];
	}

	/**
	 * @return array
	 */
	public function messages()
	{
		return [
			'cpf' => 'CPF invalido!'
		];
	}
}
