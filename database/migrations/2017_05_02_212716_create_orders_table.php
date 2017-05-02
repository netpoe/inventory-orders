<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('address_id');
            $table->integer('user_id')->unsigned()->comment('The client to be delivered');
            $table->integer('cart_id')->unsigned()->comment('A group of products to be delivered');
            $table->integer('status_id')->unsigned()->default(1)->comment('Defines the status of the order: pending | paid | in_transit | delivered | returned');
            // $table->string('distribution_center_id');
            $table->decimal('subtotal', 13, 2)->unsigned();
            $table->decimal('taxes', 2, 2)->unsigned();
            $table->decimal('discount', 2, 2)->unsigned();
            $table->decimal('total', 13, 2)->unsigned();
            $table->dateTime('deliver_at');
            $table->timestamps();
        });
    }
}
