<?php

use App\Attendance;
use App\Session;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Attendance::class, function (Faker $faker) {
    // Get a random and UserID and Session ID, integrity constraints handled in seeder.
    $userID = $faker->numberBetween($min = 1, $max = User::count());
    $sessionID = $faker->numberBetween($min = 1, $max = Session::count());
    
    // Ensure only 1 in 15 random attendances are as a moderator
    $userType = $faker->numberBetween($min = 1, $max = 15);
    if ($userType !== 1) {
        $userType = 0;
    }

    return [
        'sessionID' => $sessionID,
        'userID'    => $userID,
        'userType'  => $userType,
    ];
});
