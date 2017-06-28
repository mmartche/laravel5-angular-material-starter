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
        'base_name'              => $faker->name,
        'base_sender'            => $faker->text,
        'base_content'           => $faker->text,
        'base_periodicity'       => $faker->text,
        'base_nameExternalKey'   => $faker->text,
        'base_nameBase'          => $faker->text,
        'base_nameSubBase'       => $faker->text,
        'base_nameOrigin'        => $faker->text,
        'base_status'            => $faker->text,
        'base_country'           => $faker->text,
        'base_id_user'           => $faker->int(2)
    ];
});
$factory->define(App\Origem::class, function (Faker\Generator $faker) {
    return [
        'origin_name'  => $faker->name,
        'origin_id_base' => str_random(2),
    ];
});
$factory->define(App\Channel::class, function (Faker\Generator $faker) {
    return [
        'channel_name'  => $faker->name,
        'channel_slug'  => $faker->text,
        'channel_color' => $faker->text,
        'channel_thumbnail' => $faker->text,
        'channel_description'   => $faker->text,
        'channel_country'   => $faker->text,
        'channel_id_user'   => $faker->int(2),
        'channel_position'  => $faker->int(2)
    ];
});
$factory->define(App\BasePerChannel::class, function (Faker\Generator $faker) {
    return [
        'basePerChannel_base_id'  => $faker->int(2),
        'basePerChannel_channel_id'   => $faker->int(2)
    ];
});