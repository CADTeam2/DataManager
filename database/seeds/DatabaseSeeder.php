<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(SessionTableSeeder::class);
        $this->call(AttendanceTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
    }
}
