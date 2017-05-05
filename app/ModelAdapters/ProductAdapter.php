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
}
