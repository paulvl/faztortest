<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('product_name');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->decimal('discount', 8, 2);
            $table->string('discount_percentage');
            $table->decimal('subtotal', 8, 2);
            $table->timestamps();

            $table->foreign('order_id')
              ->references('id')->on('orders')
              ->onDelete('cascade');

            $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
