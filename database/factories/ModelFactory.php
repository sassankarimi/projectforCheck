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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Card::class, function (Faker\Generator $faker) {
    return [
        'title' => str_random(12),
    ];
});
$factory->define(App\Note::class, function (Faker\Generator $faker) {
    return [

        'user_id' => factory(User::Class)->create()->id,
        'card_id' => factory(Card::Class)->create()->id,
        'body' => $faker->paragraph,

    ];
});
    $factory->define(App\Note::class, function (Faker\Generator $faker) {
        return [

            'user_id' => factory(User::Class)->create()->id,
            'card_id' => factory(Card::Class)->create()->id,
            'body' => $faker->address,

        ];

    });
    $factory->define(App\Role::class, function (Faker\Generator $faker) {
        return [
            'name' => $faker->name,
            'label' => str_random(7),
        ];
    });

    $factory->define(App\Permission::class, function (Faker\Generator $faker) {
        return [
            'name' => $faker->name,
            'label' => str_random(8),
        ];
    });

$factory->define(App\Banner::class, function (Faker\Generator $faker) {
    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'price' => $faker->numberBetween(100000,500000),
        'description' => $faker->paragraph(3,true),

    ];
});






