<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dockerVolume>
 */
class DockerVolumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $e = ['value1' => fake()->word()];

        if (rand(1, 3) == 3)
            $e['value2'] = fake()->word();

        return $e;
    }
}
