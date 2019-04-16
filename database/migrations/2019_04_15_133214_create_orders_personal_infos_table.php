<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_personal_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->enum('cleaning_frequency', ['once', 'weekly', 'biweekly', 'monthly']);
            $table->enum('cleaning_type', ['deep of spring', 'move in', 'move out', 'post remodeling']);
            $table->enum('cleaning_date', ['next available', 'this week', 'next week', 'this month', 'i am flexible', 'just need a quote']);
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
        Schema::dropIfExists('orders_personal_infos');
    }
}
