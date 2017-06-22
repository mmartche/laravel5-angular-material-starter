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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'email' => $faker->safeEmail,
        //use bcrypt('password') if you want to assert for a specific password, but it might slow down your tests
        'password' => str_random(10),
    ];
});

$factory->define(App\PasswordReset::class, function (Faker\Generator $faker) {
    return [
        'email'  => $faker->safeEmail,
        'token' => str_random(10),
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'url'   => str_random(10),
        'content' => $faker->text,
    ];
});
$factory->define(App\Base::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'topic' => $faker->text,
    ];
});
$factory->define(App\Origem::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'id_base' => str_random(2),
    ];
});