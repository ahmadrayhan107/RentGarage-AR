<?php

namespace Database\Seeders;

use Database\Factories\GarageLocationFactory;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Ahmad Rayhan',
            'email' => 'ahmadrayhan@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'isAdmin' => 1,
        ]);

        $this->call(VehicleTypeSeeder::class);

        $this->call(RentClassSeeder::class);

        \App\Models\GarageLocation::factory(10)->create();
        \App\Models\GarageRoom::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
