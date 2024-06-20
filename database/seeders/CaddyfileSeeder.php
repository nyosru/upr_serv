<?php

namespace Database\Seeders;

use App\Models\Caddyfile;
use App\Models\CaddyfileDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaddyfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caddyfile::factory()
            ->count(5)
//            ->hasPosts(1)
            ->create();
    }
}
