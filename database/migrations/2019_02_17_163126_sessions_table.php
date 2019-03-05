<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class sessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'sessions' table with the correct columns and settings.
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('sessionID');
            $table->unsignedInteger('eventID');
            $table->string('sessionName');
            $table->dateTime('startTime')->nullable();
            $table->dateTime('endTime')->nullable();
            $table->boolean('acceptingQuestions')->default(1);
            $table->string('roomName')->nullable();
            $table->string('speaker')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eventID')->references('eventID')->on('events')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
