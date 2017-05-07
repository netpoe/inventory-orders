<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddTaxIdColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->datetime('reserved_ts')->nullable()->after('user_id')->comment('Adds a limited TS to the product after the user adds it to the cart so she can buy it before in case stock finishes.');
            $table->integer('tax_id')->unsigned()->nullable()->after('cost')->comment('Product tax id schema lets the user choose between countries taxes');

            $table->foreign('tax_id')->references('id')->on('lu_product_tax_schema');
        });
    }
}
