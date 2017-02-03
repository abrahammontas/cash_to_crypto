<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableChangeTimezoneToEst extends Migration
{

    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update("UPDATE banks set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE banks set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");

        DB::update("UPDATE orders set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE orders set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");
        DB::update("UPDATE orders set img_updated_at = CONVERT_TZ(img_updated_at, 'UTC', 'EST')");
        DB::update("UPDATE orders set completed_at = CONVERT_TZ(completed_at, 'UTC', 'EST')");

        DB::update("UPDATE password_resets set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");

        DB::update("UPDATE settings set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE settings set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");

        DB::update("UPDATE surveys set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE surveys set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");

        DB::update("UPDATE user_activations set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");

        DB::update("UPDATE users set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE users set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");

        DB::update("UPDATE wallets set created_at = CONVERT_TZ(created_at, 'UTC', 'EST')");
        DB::update("UPDATE wallets set updated_at = CONVERT_TZ(updated_at, 'UTC', 'EST')");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::update("UPDATE banks set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE banks set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");

        DB::update("UPDATE orders set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE orders set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");
        DB::update("UPDATE orders set img_updated_at = CONVERT_TZ(img_updated_at, 'EST', 'UTC')");
        DB::update("UPDATE orders set completed_at = CONVERT_TZ(completed_at, 'EST', 'UTC')");

        DB::update("UPDATE password_resets set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");

        DB::update("UPDATE settings set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE settings set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");

        DB::update("UPDATE surveys set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE surveys set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");

        DB::update("UPDATE user_activations set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");

        DB::update("UPDATE users set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE users set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");

        DB::update("UPDATE wallets set created_at = CONVERT_TZ(created_at, 'EST', 'UTC')");
        DB::update("UPDATE wallets set updated_at = CONVERT_TZ(updated_at, 'EST', 'UTC')");
    }
}
