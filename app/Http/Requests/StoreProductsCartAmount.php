<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ModelAdapters\ProductAdapter as Product;

class StoreProductsCartAmount extends FormRequest
{
    protected $productId;

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
            'product.id.*' => 'required|integer',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if ($this->amountExceedsStock()) {
                $validator->errors()->add("product.id.$this->productId", 'La cantidad seleccionada excede el stock disponible para este producto.');
            }
        });
    }

    public function amountExceedsStock(): bool
    {
        $productModel = new Product;
        $products = $this->input('product.id');
        foreach ($products as $id => $amount) {
            $this->productId = $id;

            $stock = $productModel->where('id', $id)->first(['stock'])->stock;

            if ($amount == $stock) {
                return false;
            }

            return  $amount > $stock;
        }
    }
}


