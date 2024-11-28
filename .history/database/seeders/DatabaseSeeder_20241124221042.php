<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Test Client',
            'email' => 'client@example.com',
            'password' => Hash::make('password123'),
        ]);

        $this->call(ServiceSeeder::class);
    }
}
