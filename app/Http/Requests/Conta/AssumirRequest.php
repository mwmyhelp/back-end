<?php

namespace App\Http\Requests\Conta;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class AssumirRequest extends FormRequest
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
     */
    public function rules()
    {
        $rules = [
			'user_id' => 'required',
		];

		return $rules;
    }


    public function attributes()
    {
        $attributes = [
			'user_id' => 'id do usuário',
		];

		return $attributes;
    }
}
