<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTables extends Migration
{
    public function up()
    {
    // create administrators table
        Schema::create('administrator', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');

            $table->primary(['email']);
        });

    // create sellers table
        Schema::create('seller', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->boolean('activated');

            $table->primary(['email']);
        });
    
    // create customers table
        Schema::create('customer', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('home_address');
            $table->string('phone_number');
            $table->string('activation_code')->nullable();
            $table->boolean('activated');

            $table->primary(['email']);
        });
    }

    public function down()
    {
        Schema::drop('administrator');
        Schema::drop('seller');
        Schema::drop('customer');
    }
}
