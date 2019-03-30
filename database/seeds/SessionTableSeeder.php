<?php

use App\Attendance;
use App\Session;
use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Session::class, 50)->create()->each(function ($session) {
            // As this runs before the attendance seeder, we can be certain that
            // this won't cause integrity constraints. This will simply create
            // cross references where user 1 moderates session 1, user 2 moderates
            // session 2 etc.
            factory(Attendance::class)->create([
                'sessionID' => Attendance::count() + 1,
                'userID'    => Attendance::count() + 1,
                'userType'  => 1,
           ]);
        });
    }
}
