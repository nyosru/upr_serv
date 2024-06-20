<?php

namespace Database\Seeders;

use App\Models\CaddyfileDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaddyfileDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaddyfileDomain::factory()
            ->count(20)
//            ->hasPosts(1)
            ->create();
    }
}
