<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class usersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'users' table with the correct columns and settings.
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userID');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('title');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('contactNo')->unique()->nullable();
            $table->string('email')->unique();
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
        Schema::dropIfExists('users');
    }
}
