<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $genders = ['MALE', 'FEMALE'];
    return [
        'name' => $faker->name(),
        'nis' => $faker->unique()->numberBetween(1000000000, 9999999999),
        'gender' => $genders[rand(0, 1)],
        'birth_place' => $faker->city(),
        'birth_date' => $faker->date(),
    ];
});
