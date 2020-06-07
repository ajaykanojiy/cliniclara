<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginCreatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_creates', function (Blueprint $table) {
            $table->id();
            $table->integer('log_id');
            $table->string('name');
            $table->integer('number');
            $table->string('email');
            $table->string('password');
            $table->integer('designation')->nullable();
            $table->integer('type');
            $table->integer('status');
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
        Schema::dropIfExists('login_creates');
    }
}
