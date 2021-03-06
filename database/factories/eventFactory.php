<?php

use App\Event;
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

$factory->define(Event::class, function (Faker $faker) {
    return [
        'userID'    => $faker->numberBetween($min = 1, $max = User::count()),
        'eventName' => $faker->sentence,
        'street'    => $faker->optional($weight = 0.8)->streetAddress,
        'city'      => $faker->optional($weight = 0.9)->city,
        'postcode'  => $faker->optional($weight = 0.7)->postcode,
        'contactNo' => $faker->optional($weight = 0.4)->phoneNumber,
        'email'     => $faker->optional($weight = 0.8)->safeEmail,
    ];
});
