<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'client_id' => User::where('role', 'client')->inRandomOrder()->first()->id,
            'service_id' => Service::all()->random()->id,
            'text' => $this->faker->realText(),
            'rating' => $this->faker->numberBetween(1,5),
            'published' => $this->faker->boolean(),
        ];
    }
}
