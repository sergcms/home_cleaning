<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->enum('pet', ['None', 'Dog', 'Cat', 'Both']);
            $table->enum('adults_people', ['None', '1 - 2', '3 - 4', '5 and more']);
            $table->enum('children', ['None', '1', '2', '3 and more']);
            $table->integer('rate_home_cleanlines');
            $table->boolean('cleaning_before');
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
        Schema::dropIfExists('orders_homes');
    }
}
