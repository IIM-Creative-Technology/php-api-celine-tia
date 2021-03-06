<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            //clé étrangère:étudiant
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('cascade');

            //clé étrangère:matière
            $table->unsignedBigInteger('id_subject');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('cascade');

            $table->float('score');
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
        Schema::dropIfExists('marks');
    }
}
