<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersMaterialsFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_materials_floors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->boolean('hardwood');
            $table->boolean('cork');
            $table->boolean('vinyl');
            $table->boolean('concrete');
            $table->boolean('carpet');
            $table->boolean('natural_stone');
            $table->boolean('tile');
            $table->boolean('laminate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_materials_floors');
    }
}
