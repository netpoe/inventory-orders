<?php

namespace App\ModelAdapters;

use App\Product;

class ProductAdapter extends Product
{
    public function makeSku(): string
    {
        $productId = $this->id;
        $productBrandId = $this->brand->id;
        $productUserId = $this->user_id;

        $sku = "$productId:$productBrandId:$productUserId";

        return $sku;
    }

    public function amountOnCart()
    {
        return $this->cart->product_amount;
    }

    public function total()
    {
        $total = ($this->price * $this->amountOnCart()) / (1 + $this->discount);
        return round($total, 2);
    }
}
