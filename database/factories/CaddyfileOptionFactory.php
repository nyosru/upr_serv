<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaddyfileOption>
 */
class CaddyfileOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'caddyfile_id' => rand(1,50),
            'name'=>fake()->word(),
            'value'=>fake()->word(),

        ];
    }
}
