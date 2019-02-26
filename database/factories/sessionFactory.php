<?php

use App\Attendance;
use App\Event;
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

$factory->define(Session::class, function (Faker $faker) {
    // Ensuring that the ending dates are always a reasonable time after the starting dates.
    $startTime = $faker->optional($weight = 0.8)->dateTimeInInterval('now','+3 months');
    if ($startTime) {
        $sessionLength = $faker->randomElement(['+1 hour', '+2 hours', '+3 hours']);
        $endTime = strtotime($sessionLength, $startTime->getTimestamp());
    } else {
        $endTime = null;
    }

    // This will set the speaker for the first session to the 1st user, 2nd to the 2nd etc.
    // This keeps the data consistent with the moderators assigned in the SessionTableSeeder.
    static $userID = 1;
    $speaker = User::where('userID', $userID++)->first();

    return [
        'eventID'            => $faker->numberBetween($min = 1, $max = Event::count()),
        'startTime'          => $startTime,
        'endTime'            => $endTime,
        'acceptingQuestions' => $faker->boolean(80),
        'roomName'           => $faker->secondaryAddress,
        'speaker'            => $speaker->title." ".$speaker->firstName." ".$speaker->lastName,
    ];
});
