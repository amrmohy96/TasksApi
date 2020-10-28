<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;
$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'name' => $faker->word
    ];
});
