<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Academic' => ['Math Tutor', 'Science Teacher', 'Language Instructor'],
            'Arts' => ['Piano Teacher', 'Art Instructor', 'Dance Coach'],
            'Tech Skills' => ['Web Developer', 'Mobile App Developer', 'Data Scientist'],
            'Languages' => ['English Tutor', 'Spanish Teacher', 'Mandarin Instructor'],
            'Business' => ['Business Coach', 'Marketing Consultant', 'Financial Advisor'],
            'Fitness' => ['Personal Trainer', 'Yoga Instructor', 'Nutrition Coach']
        ];

        $spanishCities = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza',
            'Málaga', 'Murcia', 'Palma', 'Bilbao', 'Alicante',
            'Córdoba', 'Valladolid', 'Vigo', 'Gijón', 'Granada'
        ];

        // For each category and service title
        foreach ($categories as $category => $titles) {
            foreach ($titles as $title) {
                // Create 3 providers per service per city
                foreach ($spanishCities as $city) {
                    for ($i = 0; $i < 3; $i++) {
                        $provider = User::factory()->create(['is_provider' => true]);

                        Service::create([
                            'user_id' => $provider->id,
                            'title' => $title,
                            'description' => fake()->paragraph(3),
                            'category' => $category,
                            'price' => fake()->numberBetween(30, 150),
                            'location' => $city,
                            'is_active' => true,
                        ]);
                    }
                }
            }
        }
    }
} 
