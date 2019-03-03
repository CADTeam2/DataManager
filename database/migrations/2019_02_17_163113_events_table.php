<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class eventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'events' table with the correct columns and settings.
        Schema::create('events', function (Blueprint $table) {
            $table->increments('eventID');
            $table->string('password');
            $table->string('accountName')->unique();
            $table->string('eventName');
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('contactNo')->unique()->nullable();
            $table->string('email')->unique();
            $table->boolean('hideDetails')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
