<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_state_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('order_id')
              ->references('id')->on('orders')
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
        Schema::drop('order_state_histories');
    }
}
