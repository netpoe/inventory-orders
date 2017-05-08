<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function tax()
    {
        return $this->hasOne('\App\ModelAdapters\LuProductTaxSchemaAdapter', 'id', 'tax_id');
    }

    public function address()
    {
        return $this->hasOne('\App\ModelAdapters\UserAddressAdapter', 'id', 'address_id');
    }

    public function status()
    {
        return $this->hasOne('\App\ModelAdapters\LuOrderStatusAdapter', 'id', 'status_id');
    }
}
