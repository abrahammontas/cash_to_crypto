<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Settings;

class AlterTableSetBannerParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Settings::setParam('banner_text', '');
        Settings::setParam('banner_on', 0);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Settings::deleteParam('banner_text');
        Settings::deleteParam('banner_on');
    }
}
