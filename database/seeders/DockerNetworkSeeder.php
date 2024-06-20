<?php

namespace Database\Seeders;

use App\Models\Docker;
use App\Models\DockerNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DockerNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DockerNetwork::factory(5)

            ->create();
    }
}
