<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Testimonial;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        // Form 10 random clients
        User::factory(10)->create();

        //Form 5 random personal
        User::factory(5)->create([
            'role' => 'personal',
        ]);

        //Form 10 types of services
        ServiceType::factory(10)->create();

        //Form 15 services
        Service::factory(15)->create();

        //Form 25 testimonials
        Testimonial::factory(25)->create();    }
}
