<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class attendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'attendances' table with the correct columns and settings.
        Schema::create('attendances', function (Blueprint $table) {
            $table->unsignedInteger('sessionID');
            $table->unsignedInteger('userID');
            $table->integer('userType');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['sessionID', 'userID']);
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
        Schema::dropIfExists('attendances');
    }
}
