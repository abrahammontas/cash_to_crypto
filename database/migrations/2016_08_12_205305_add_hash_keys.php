<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHashKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('hash', 128);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('hash', 128);
        });


        DB::statement("ALTER TABLE orders CHANGE bitcoins bitcoins DOUBLE(8,5) NOT NULL");
        DB::statement("UPDATE users SET hash = MD5(id)");
        DB::statement("UPDATE orders SET hash = MD5(id)");

        Schema::table('users', function (Blueprint $table) {
            $table->unique('hash');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unique('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('hash');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('hash');
        });
        DB::statement("ALTER TABLE orders CHANGE bitcoins bitcoins DOUBLE(8,2) NOT NULL");
    }
}
