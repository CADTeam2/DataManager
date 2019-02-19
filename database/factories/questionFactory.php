<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    $sessionIDs = DB::table('Session')->pluck('sessionID')->get();
    $userIDs = DB::table('User')->pluck('userID')->get();
    return [
        //'questionID' => $faker->idNumber,
        'sessionID' => $faker->randomElement($sessoinIDs),
        'userID' => $faker->randomElement($userIDs),
        'question' =>sentence($nbWords = 6, $variableNbWords = true),
        'priority' => $faker->numberBetween($min = 0, $max = 4),
    ];
});
