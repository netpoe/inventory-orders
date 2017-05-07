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
}
