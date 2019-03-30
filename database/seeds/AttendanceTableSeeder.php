<?php

use App\Attendance;
use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $attendances = factory(Attendance::class, 1000)->make();

        // Because composite keys and lumen don't play nice,
        // we deal with the integrity constraint here with a try
        // catch on constraint failure.
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
