<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCartShipping extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'zip_code' => 'required|string|numeric|max:5|min:5',
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city' => 'required|string',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'interior' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required|string|numeric',
            'name' => 'required|string|max:35',
            'paternal_last_name' => 'required|string|max:35',
            'maternal_last_name' => 'required|string|max:35',
        ];
    }
}
