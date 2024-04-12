<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'userName' => 'client1',
            'userName_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        // admins

        \App\Models\Admin::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'Test User',
            'userName' => 'admin1',
            'userName_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
