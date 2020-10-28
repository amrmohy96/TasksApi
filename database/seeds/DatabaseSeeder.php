<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'amr',
            'email' => 'amr@api.com',
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'name' => 'dev',
            'email' => 'dev@api.com',
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'name' => 'joe',
            'email' => 'joe@api.com',
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'name' => 'jone',
            'email' => 'jone@api.com',
            'password' => bcrypt('123456')
        ]);
        factory(\App\Models\Project::class,30)->create();
        factory(\App\Models\Task::class,40)->create();
    }
}
