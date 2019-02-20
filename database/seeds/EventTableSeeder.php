<?php

use Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	echo("Creating events...");
        factory(Event::class, 50)->create();
        echo("Events created succesfully!");
    }
}
