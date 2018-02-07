<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('price')->unsigned();
        });

        Schema::create('image', function (Blueprint $table) {
            $table->string('filepath');
            $table->integer('item_id')->unsigned();

            $table->foreign('item_id')->references('id')->on('item');
            $table->primary(['filepath']);
        });

        Schema::create('rating', function (Blueprint $table) {
            $table->string('customer_email');
            $table->integer('item_id')->unsigned();
            $table->integer('rating')->unsigned();

            $table->foreign('customer_email')->references('email')->on('customer');
            $table->foreign('item_id')->references('id')->on('item');
            $table->primary(['customer_email', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
        Schema::dropIfExists('image');
        Schema::dropIfExists('rating');
    }
}
