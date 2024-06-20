<?php

namespace Database\Seeders;

use App\Models\Docker;
use App\Models\DockerVolume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DockerVolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DockerVolume::factory(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'docker_id' => Docker::all()->random(),
                ],
            ))
            ->create();
    }
}
