<?php

use Faztor\OrderState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Model::unguard();

        OrderState::create(['name' => 'Nuevo']);
        OrderState::create(['name' => 'Pagado']);
        OrderState::create(['name' => 'Enviado']);
        OrderState::create(['name' => 'Entregado']);
        OrderState::create(['name' => 'Devuelto']);
        OrderState::create(['name' => 'Cancelado']);

        Model::reguard();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_states');
    }
}
