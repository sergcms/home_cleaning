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
            $table->enum('pet', ['none', 'dog', 'cat', 'both']);
            $table->enum('count_pets', ['none', 'one', 'two', 'more'])->default('none');
            $table->enum('adults_people', ['none', 'one_two', 'three_four', 'more']);
            $table->enum('children', ['none', 'one', 'two', 'more']);
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
