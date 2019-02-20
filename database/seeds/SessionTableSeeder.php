<?php

use App\Attendance;
use App\Session;
use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	echo("Creating sessions...");
        factory(Session::class, 30)->create();
        echo("Sessions created succesfully!");
    }
}
