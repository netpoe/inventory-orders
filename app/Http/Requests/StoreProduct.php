<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:3500',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'brand_id' => 'required|integer',
            'stock' => 'integer',
            'status_id' => 'required|integer',
        ];
    }
}
