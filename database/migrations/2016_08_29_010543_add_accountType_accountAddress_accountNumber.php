<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountTypeAccountAddressAccountNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banks', function (Blueprint $table) {
            $table->string('account_type');
            $table->string('account_number');
            $table->text('account_address');
            $table->text('directions_before');
            $table->text('directions_after');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banks', function (Blueprint $table) {
            $table->dropColumn('account_type');
            $table->dropColumn('account_number');
            $table->dropColumn('account_address');
            $table->dropColumn('directions_before');
            $table->dropColumn('directions_after');
        });
    }
}
