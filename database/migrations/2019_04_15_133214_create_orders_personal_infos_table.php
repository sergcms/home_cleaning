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
            $table->enum('cleaning_frequency', ['Once', 'Weekly', 'Biweekly', 'Monthly']);
            $table->enum('cleaning_type', ['Deep of Spring', 'Move In', 'Move Out', 'Post Remodeling']);
            $table->enum('cleaning_date', ['Next available', 'This week', 'Next week', 'This Month', 'I am flexible', 'Just need a quote']);
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
