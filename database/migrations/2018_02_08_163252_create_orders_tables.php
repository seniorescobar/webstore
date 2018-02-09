<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->string('id');
            $table->primary(['id']);
        });
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_email');
            $table->string('status_id');

            $table->foreign('status_id')->references('id')->on('status');
        });
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity')->unsigned();

            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('item_id')->references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
