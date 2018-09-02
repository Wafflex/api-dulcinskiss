<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persons_id')->unsigned();
            $table->string('username');
            $table->string('password');
            $table->integer('rols_id')->unsigned();
        });

        Schema::table('users', function($table) {
            $table->foreign('persons_id')->references('id')->on('persons')->onDelete('cascade');
            $table->foreign('rols_id')->references('id')->on('rols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
