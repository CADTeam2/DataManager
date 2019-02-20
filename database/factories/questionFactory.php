<?php

use App\Question;
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

$factory->define(Question::class, function (Faker $faker) {
	// Add more randomness to question length as variableNbWords only vairies by +/- 40%
	$questionLength = $faker->numberBetween($min = 5, $max = 30);

    return [
        'sessionID' => $faker->numberBetween($min = 1, $max = Session::count()),
        'userID' 	=> $faker->numberBetween($min = 1, $max = User::count()),
        'question'  => $faker->sentence($nbWords = $questionLength, $variableNbWords = true),
        'priority'  => $faker->numberBetween($min = 0, $max = 4),
    ];
});
