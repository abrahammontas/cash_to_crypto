<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrdersStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE orders CHANGE status status ENUM('pending','completed','issue','cancelled') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement("ALTER TABLE orders CHANGE status status ENUM('pending','completed','issue') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
    }
}
