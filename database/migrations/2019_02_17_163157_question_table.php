<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'Question' table with the correct columns and settings.
        Schema::create('Question', function (Blueprint $table) {
            $priorityDefault = 0;

            $table->increments('questionID');
            $table->unsignedInteger('sessionID');
            $table->unsignedInteger('userID');
            $table->string('question');
            $table->integer('priority')->default($priorityDefault);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sessionID')->references('sessionID')->on('Session')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userID')->references('userID')->on('User')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Question');
    }
}
