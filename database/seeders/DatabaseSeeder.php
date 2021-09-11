<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::withoutEvents(function () {
            // Create 1 admin
            User::factory()->create([
                'role' => 'admin',
            ]);
            // Create 2 redactors
            User::factory()->count(2)->create([
                'role' => 'redac',
            ]);
            // Create 3 users
            User::factory()->count(3)->create();
        });
    }
}
