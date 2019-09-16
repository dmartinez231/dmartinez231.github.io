<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('price');
            $table->bigInteger('quantity')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');
            $table->bigInteger('cart_id')->unsigned();
            $table->foreign('cart_id')
                  ->references('id')
                  ->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_items');
    }
}
