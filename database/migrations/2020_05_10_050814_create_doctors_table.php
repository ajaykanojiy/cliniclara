<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number');
            $table->string('email');
            $table->text('main_educaton')->nullable();
            $table->string('medical_reg_no')->nullable();
            $table->integer('speciality')->nullable();
            $table->string('year_of_experience')->nullable();
            $table->integer('patients_per_hour')->nullable();
            $table->integer('fees');
            $table->integer('gender');
            $table->string('image')->nullable();
            $table->integer('days');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('doctors');
    }
}
