<?php

use Addendance;
use Session;
use User;
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
	// Here we are ensuring that the composite key integrity is accounted for by only
	// allowing session ID's for sessions not already attended by the random user.
    $userID = $faker->numberBetween($min = 1, $max = User::count());
    $existingAttendances = Attendance::where('userID', $userID)->get('sessionID');
    $allSessions = range(1, Session::count());
    $possibleSessions = array_diff($existingAttendances, $allSessions);
    $sessionID = $faker->randomElement($possibleSessions);

    
    // Ensure only 1 in 20 random attendances are as a moderator
    $userType = $faker->numberBetween($min = 1, $max = 20);
    if ($userType !== 1) {
    	$userType = 0;
    }

    return [
        'sessionID' => $sessionID,
        'userID' 	=> $userID,
        'userType'  => $userType,
    ];
});
