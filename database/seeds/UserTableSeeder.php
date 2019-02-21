<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// Note that due to the way SessionTableSeeder is set up,
    	// there must be more users than sessions for the seeder to
    	// avoid database integrity constraints.
        factory(User::class, 200)->create();
    }
}
