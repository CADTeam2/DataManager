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
    return [
        'username' => $faker->unique()->userName,
        'password' => $faker->password,
        'title' => $faker->title($gender = null|'male'|'female'),
        'firstName' => $faker->firstName($gender = null|'male'|'female'),
        'lastName' => $faker->lastName,
        'contactNo' => $faker->phonenumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
