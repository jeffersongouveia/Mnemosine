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
$factory->define(Mnemosine\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'deleted' => false,
        'remember_token' => str_random(10)
    ];
});

$factory->define(Mnemosine\Vault::class, function(Faker\Generator $faker) {
   return [
        'name' => $faker->word,
        'deleted' => false
   ] ;
});

$factory->define(Mnemosine\Login::class, function(Faker\Generator $faker) {
    return [
        'id_vault' => random_int(1, 3),
        'name' => $faker->word,
        'username' => $faker->userName,
        'password' => $faker->password(6, 21),
        'strength' => random_int(1, 10),
        'ip' => $faker->ipv4,
        'dns' => $faker->domainName,
        'equipment' => random_int(1, 10) % 2 == 0 ? 'Mikrotik' : 'Ubiquiti',
        'favorite' => false,
        'deleted' => false
    ];
});