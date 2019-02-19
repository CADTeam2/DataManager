<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'Attendance' table with the correct columns and settings.
        Schema::create('Attendance', function (Blueprint $table) {
            $table->unsignedInteger('sessionID');
            $table->unsignedInteger('userID');
            $table->integer('userType');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['sessionID', 'userID']);
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
        Schema::dropIfExists('Attendance');
    }
}
