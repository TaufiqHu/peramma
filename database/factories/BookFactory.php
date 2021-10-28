<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->words(rand(3, 6), true),
        'stock' => $faker->randomDigit(),
        'isbn' => $faker->isbn13(),
        'publisher' => $faker->company(),
        'author' => $faker->firstNameMale(),
        'published_year' => rand(2001, 2021),
        'page_count' => rand(50, 250),
        'condition' => 'GOOD',
    ];
});
