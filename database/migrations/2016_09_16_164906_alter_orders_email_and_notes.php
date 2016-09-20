<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrdersEmailAndNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // must manually rename column because of doctrine issues with renameColumn function and enum columns
            // $table->renameColumn('note', 'email');
            $table->text('notes')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // $table->renameColumn('email', 'note');
            $table->dropColumn('notes');
        });
    }
}
