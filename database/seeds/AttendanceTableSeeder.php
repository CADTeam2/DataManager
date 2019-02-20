<?php

use App\Attendance;
use Illuminate\Database\Seeder;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// Because composite keys and laravel don't play nice,
    	// we deal with the integrity constraint here with a try
    	// catch on constraint failure.
        $attendances = factory(Attendance::class, 1000)->make();

        foreach ($attendances as $attendance) {
        	repeat:
            try {
                $attendance->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $attendance = factory(Attendance::class)->make();
                goto repeat;
            }	
        }
    }
}
