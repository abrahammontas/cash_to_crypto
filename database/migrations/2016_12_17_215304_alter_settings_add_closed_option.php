<?php

use App\Settings;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingsAddClosedOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Settings::setParam('open', 1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Settings::deleteParam('open');
    }
}
