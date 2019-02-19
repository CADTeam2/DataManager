<?php

use Attendance;
use Session;
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
    	echo("Creating sessions...");
        factory(Session::class, 30)->create()->each(function ($session)) {
        	$session->attendances()->save(factory(Attendance::class)->make());
        }
        echo("Sessions created succesfully!");
    }
}
