<?php

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
        factory(Session::class, 50)->create();
    }
}
