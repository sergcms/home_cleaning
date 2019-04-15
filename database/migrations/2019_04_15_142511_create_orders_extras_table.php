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
            $table->boolean('inside_fridge');
            $table->boolean('inside_oven');
            $table->boolean('garage_swept');
            $table->boolean('inside_cabinets');
            $table->boolean('laundry_wash_dry');
            $table->boolean('bed_sheet_change');
            $table->boolean('blinds_cleaning');
            $table->boolean('on_weekend');
            $table->boolean('carpet_cleaned');
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
