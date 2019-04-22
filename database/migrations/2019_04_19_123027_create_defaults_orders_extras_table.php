<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultsOrdersExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_extras', function (Blueprint $table) {
            $table->boolean('inside_fridge')->default(0)->change();
            $table->boolean('inside_oven')->default(0)->change();
            $table->boolean('garage_swept')->default(0)->change();
            $table->boolean('inside_cabinets')->default(0)->change();
            $table->boolean('laundry_wash_dry')->default(0)->change();
            $table->boolean('bed_sheet_change')->default(0)->change();
            $table->boolean('blinds_cleaning')->default(0)->change();
            $table->boolean('on_weekend')->default(0)->change();
            $table->boolean('carpet_cleaned')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_extras', function (Blueprint $table) {
            //
        });
    }
}
