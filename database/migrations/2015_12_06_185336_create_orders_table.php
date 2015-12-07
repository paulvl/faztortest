<?php

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
            $table->integer('user_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->string('from')->nullable();
            $table->string('to');
            $table->string('address');
            $table->string('phone');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('total_due', 8, 2);
            $table->decimal('total_due', 8, 2);
            $table->decimal('total_due', 8, 2);
            $table->string('payment_method')->nullable();
            $table->string('delivery_method')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');

            $table->foreign('state_id')
              ->references('id')->on('order_states')
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
        Schema::drop('orders');
    }
}
