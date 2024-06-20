<?php

namespace Database\Seeders;

use App\Models\Docker;
use App\Models\DockerNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Docker::factory(50)
            ->state(new Sequence(
                fn(Sequence $sequence) => [
                    'docker_network_id' => DockerNetwork::all()->random(),
                ],
            ))
            ->create();
    }
}
