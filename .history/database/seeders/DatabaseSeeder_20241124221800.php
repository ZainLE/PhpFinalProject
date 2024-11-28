<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test client
        User::create([
            'name' => 'Test Client',
            'email' => 'client@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Call the ServiceSeeder
        $this->call(ServiceSeeder::class);
    }
} 
