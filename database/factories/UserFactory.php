<?php

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

$factory->define(User::class, function (Faker $faker) {
    // Faker only supports traditional genders.
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'username' => $faker->unique()->userName,
        'password' => $faker->password,
        'title' => $faker->title($gender),
        'firstName' => $faker->firstName($gender),
        'lastName' => $faker->lastName,
        'contactNo' => $faker->optional($weight = 0.8)->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
