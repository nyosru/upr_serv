<?php

namespace Database\Seeders;

use App\Models\Docker;
use App\Models\DockerNetwork;
use App\Models\DockerOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DockerOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DockerOption::factory(200)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'docker_id' => Docker::all()->random(),
                ],
            ))
            ->create();
    }
}
