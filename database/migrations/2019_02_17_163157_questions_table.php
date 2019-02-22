<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class questionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'questions' table with the correct columns and settings.
        Schema::create('questions', function (Blueprint $table) {
            $priorityDefault = 0;

            $table->increments('questionID');
            $table->unsignedInteger('sessionID');
            $table->unsignedInteger('userID');
            $table->text('question');
            $table->integer('priority')->default($priorityDefault);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sessionID')->references('sessionID')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
