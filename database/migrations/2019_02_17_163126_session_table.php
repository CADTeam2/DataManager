<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'Session' table with the correct columns and settings.
        Schema::create('Session', function (Blueprint $table) {
            $table->increments('sessionID');
            $table->unsignedInteger('eventID');
            $table->dateTimeTz('startTime')->nullable();
            $table->dateTimeTz('endTime')->nullable();
            $table->boolean('acceptingQuestions');
            $table->string('roomName')->nullable();
            $table->string('speaker');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eventID')->references('eventID')->on('Event')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Session');
    }
}
