<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            $table->string('wallet', 50);
            $table->float('amount');
            $table->float('bitcoins');
            $table->float('total');
            $table->string('receipt')->nullable();
            $table->enum('status', ['pending', 'completed', 'issue'])->deault('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
