<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\GCCPFValidationRule;

class GCNewCostumerRequest extends FormRequest
{
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255', 'unique:costumers'],
            'password' => ['required', 'confirmed', 'min:6', 'max:255'],
            'document_code' => ['required', 'string', 'min:11', 'max:11', new GCCPFValidationRule, 'unique:costumers'],
            'phone_number' => ['numberic', 'digits_between:8,14']
        ];
    }
}
