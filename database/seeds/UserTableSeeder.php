<?php

use User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	echo("Creating users...");
        factory(User::class, 50)->create();
        echo("Users created succesfully!");
    }
}
