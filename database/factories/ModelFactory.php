<?php

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Photo;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Apartment::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'cover_image' => $faker->imageUrl(640, 480, 'city'),
        'address' => $faker->address,
        'district' => $faker->word,
        'price' => $faker->randomNumber(),
        'bedroom_total' => $faker->numberBetween(1, 5),
        'unit_total' => $faker->numberBetween(1, 5),
        'maintenance_fee' => $faker->randomNumber(),
        'facilities' => ['tv', 'ac', 'tes'],
    ];
});

$factory->define(Album::class, function (Faker\Generator $faker) {
    return [
    	'name' => $faker->word,
    ];
});

$factory->define(Photo::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->imageUrl(640, 480),
    ];
});
