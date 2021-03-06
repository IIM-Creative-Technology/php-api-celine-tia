<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date_begin');
            $table->dateTime('date_end');

            //clé étrangère:intervenant
            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('cascade');

            //clé étrangère:promotion
            $table->unsignedBigInteger('id_school_year');
            $table->foreign('id_school_year')->references('id')->on('classes')->onDelete('cascade');

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
        Schema::dropIfExists('subjects');
    }
}
