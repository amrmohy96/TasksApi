<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'project_id'=>\App\Models\Project::inRandomOrder()->first()->id,
    ];
});
