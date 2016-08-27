<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Settings;

class AlterUsersAddLimits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean("personalLimits")->default(false);
            $table->integer("dailyLimit");
            $table->integer("monthlyLimit");
        });
        Settings::setParam('dailyLimit', 6000);
        Settings::setParam('monthlyLimit', 30000);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("personalLimits");
            $table->dropColumn("dailyLimit");
            $table->dropColumn("monthlyLimit");
        });
        Settings::deleteParam('dailyLimit');
        Settings::deleteParam('monthlyLimit');
    }
}
