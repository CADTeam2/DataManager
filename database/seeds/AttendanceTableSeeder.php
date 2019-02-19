<?php

use Attendance;
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
        echo("Creating attendances...");
        factory(Attendance::class, 250)->create();
        echo("Attendances created succesfully!");
    }
}
