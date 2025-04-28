<?php

namespace Database\Factories;

use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'duration' => $this->faker->numberBetween(5, 120),
            'need_personal' => $this->faker->boolean(),
            'image' => 'https://loremflickr.com/640/480/business?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'service_type_id' => ServiceType::all()->random()->id
        ];
    }
}
