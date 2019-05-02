<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class AddFieldsNullableTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `users` CHANGE `hear_about_us` `hear_about_us` ENUM('Friends', 'Radio', 'TV', 'Magazine') default null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `first_name` varchar(255) null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `last_name` varchar(255) null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `address` varchar(255) null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `phone` varchar(255) null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `city` varchar(255) null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `apt` int null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `zip_code` int null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `square_footage` int null;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `users` CHANGE `hear_about_us` `hear_about_us` ENUM('Friends', 'Radio', 'TV', 'Magazine') not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `first_name` varchar(255) not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `last_name` varchar(255) not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `address` varchar(255) not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `phone` varchar(255) not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `city` varchar(255) not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `apt` int not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `zip_code` int not null;");
        DB::statement("ALTER TABLE `users` MODIFY COLUMN `square_footage` int not null;");
    }
}
