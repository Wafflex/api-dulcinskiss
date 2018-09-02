<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requests_id')->unsigned();
            $table->integer('paymentmethods_id')->unsigned();
        });

        Schema::table('users', function($table) {
            $table->foreign('requests_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('paymentmethods_id')->references('id')->on('paymentmethods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
