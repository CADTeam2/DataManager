<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'User' table with the correct columns and settings.
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('userID');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('title');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('contactNo')->unique()->nullable();
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
        Schema::dropIfExists('User');
    }
}
