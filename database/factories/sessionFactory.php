<?php

use Attendance;
use Event;
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

$factory->define(Session::class, function (Faker $faker) {
    // Ensuring that the ending dates are always a reasonable time after the starting dates.
    $startingTime = $faker->optional($weight = 0.8)->dateTimeThisYear('+1 month');
    if ($startTime) {
        $sessionLength = $faker->randomElement(['+1 hour', '+2 hours', '+3 hours']);
        $endingTime = $faker->dateTimeBetween($startingTime, strtotime($sessionLength));
    }

    // We need to ensure that at least one speaker attends each session and so create a new
    // attendance with specific details here.
    $sessionID = Session::count()++;
    $uid = $faker->numberBetween($min = 1, $max = User::count());
    $speaker = User::where('userID', $uid)->first();

    factory(Attendance::class)->create([
        'sessionID' => $sessionID,
        'userID'    => $speaker->userID,
        'userType'  => 1;
    ]);

    return [
        'eventID'            => $faker->numberBetween($min = 1, $max = Event::count()),
        'startTime'          => $startingTime,
        'endTime'            => $endingTime,
        'acceptingQuestions' => $faker->boolean,
        'roomName'           => $faker->secondaryAddress,
        'speaker'            => $speaker->title." ".$speaker->firstName." ".$speaker->lastName,
    ];
});
