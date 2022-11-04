<?php

namespace App\Http\Requests\v1\Documents\Document;

use Illuminate\Foundation\Http\FormRequest;

class documentActionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /**
         * Master admin can do whatever they want
         */
        if(\Auth::user()->isMasterAdmin())
            return true;

        /**
         * Behavior based on method
         */
        switch ($this->method()) {
            default: // For now we use only one authorization type
                return $this->defaultAuthorization();
                break;
        }

        // If do not return for some reason
        return false;
    }

    /**
     * Default Authorization Test
     */
    private function defaultAuthorization(){
        /**
         * Check if the user has the same bee_account than the document
         */
        if(\Auth::user()->belongsToAccount($this->document->bee_account_id))
            return true;

        /**
         * TODO::
         * Check if the user have the permission to get this doc
         */
        // .... //

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**
         * Behavior based on method
         */
        switch ($this->method()) {
            case 'PUT': // Validation rules for update
                return $this->putValidation();
                break;
            default: // For default we do not have validation rules
                return [];
                break;
        }

        return [];
    }

    /**
     * Validation rules for PUT method
     */
    private function putValidation(){
        return [
            'html_data' => 'required|string',
            'title' => 'required|string'
        ];
    }
}
