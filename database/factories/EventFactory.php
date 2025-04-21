<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thumbnail' => $this->faker->imageUrl(),
            'name' => $this->faker->randomElement(['Belajar Bahasa Inggris', 'Jalan Sehat', 'Kerja Bakti']). ' ' . $this->faker->city(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 100000, 1000000),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'time' => $this->faker->time(),
            'is_active' => $this->faker->boolean()
        ];
    }
}
