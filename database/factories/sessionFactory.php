<?php

use Event;
use Session;
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
    return [
        'eventID' => $faker->numberBetween($min = 1, $max = Event::count()),
        'startTime' => $faker->time($format = 'H:i:s', $max = 'now'),
        'endTime' => $faker->time($format = 'H:i:s', $max = 'now'),
        'acceptingQuestions' => $faker->boolean,
        'roomName' => $faker->numberBetween($min = 1, $max = 100),
        'speaker' => $faker->firstName($gender = null|'male'|'female'),
    ];
});
