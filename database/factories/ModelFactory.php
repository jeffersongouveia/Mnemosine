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

$factory->define(Mnemosine\Vault::class, function(Faker\Generator $faker) {
   return [
        'name' => $faker->word,
        'deleted' => false
   ] ;
});

$factory->define(Mnemosine\Login::class, function(Faker\Generator $faker) {
    $icons = ['android', 'apple', 'chrome', 'firefox', 'itunes', 'java', 'linux', 'safari', 'spotify'];

    return [
        'id_vault' => random_int(1, 3),
        'icon' => 'img/icons/' . $icons[random_int(0, 8)] . '.png',
        'name' => $faker->word,
        'username' => $faker->userName,
        'password' => $faker->password(6, 21),
        'strength' => random_int(10, 100),
        'ip' => $faker->ipv4,
        'dns' => $faker->domainName,
        'equipment' => random_int(1, 10) % 2 == 0 ? 'Mikrotik' : 'Ubiquiti',
        'favorite' => false,
        'deleted' => false
    ];
});

$factory->define(Mnemosine\Note::class, function(Faker\Generator $faker) {
    return [
        'id_vault' => random_int(1, 3),
        'icon' => 'img/icons/text-lines.png',
        'name' => $faker->word,
        'note' => $faker->paragraphs(3, true),
        'favorite' => false,
        'deleted' => false
    ];
});