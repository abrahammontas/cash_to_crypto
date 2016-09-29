<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('used_us');
            $table->string('hear_about');
            $table->string('state');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
           $table->boolean('completed_survey')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('surveys');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('completed_survey');
        });
    }
}
