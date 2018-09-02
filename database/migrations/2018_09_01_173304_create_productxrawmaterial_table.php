<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductxRawmaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsxrawmaterials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned();
            $table->integer('rawmaterials_id')->unsigned();
            $table->string('quantity');
            $table->integer('meditions_id')->unsigned();
        });

        Schema::table('users', function($table) {
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('rawmaterials_id')->references('id')->on('rawmaterials')->onDelete('cascade');
            $table->foreign('meditions_id')->references('id')->on('meditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productsxrawmaterials');
    }
}
