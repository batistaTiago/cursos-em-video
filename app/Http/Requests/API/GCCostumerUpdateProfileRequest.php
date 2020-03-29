<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class GCCostumerUpdateProfileRequest extends FormRequest
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
            'costumer_id' => ['required', 'exists:costumers,id'],
            'name' => ['string', 'min:2', 'max:255'],
            'new_password' => ['confirmed', 'min:6', 'max:255'],
            'phone_number' => ['numeric', 'digits_between:8,14'],
            'current_password' => ['required_with:new_password'],
        ];
    }
}
