<?php

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

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3, true),
        'description' => $faker->sentence(6, true),
        'price' => $faker->NumberBetween(25, 150),
        'author_id' => $faker->NumberBetween(1, 50),
    ];
});
