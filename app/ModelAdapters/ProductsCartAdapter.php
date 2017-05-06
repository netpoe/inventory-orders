<?php

namespace App\ModelAdapters;

use App\ProductsCart;

class ProductsCartAdapter extends ProductsCart
{
    public function setProductsAmount(String $cookie, Array $products)
    {
        foreach ($products as $id => $amount) {

            $this->where('session', $cookie)
                ->where('product_id', $id)
                ->update(['product_amount' => $amount]);
        }

        return $this;
    }
}
