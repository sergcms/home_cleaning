<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_extras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->boolean('inside_fridge')->default(0);
            $table->boolean('inside_oven')->default(0);
            $table->boolean('garage_swept')->default(0);
            $table->boolean('inside_cabinets')->default(0);
            $table->boolean('laundry_wash_dry')->default(0);
            $table->boolean('bed_sheet_change')->default(0);
            $table->boolean('blinds_cleaning')->default(0);
            $table->boolean('on_weekend')->default(0);
            $table->boolean('carpet_cleaned')->default(0);
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
        Schema::dropIfExists('orders_extras');
    }
}
