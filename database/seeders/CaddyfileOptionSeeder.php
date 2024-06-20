<?php

namespace Database\Seeders;

use App\Models\CaddyfileOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaddyfileOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaddyfileOption::factory()
            ->count(20)
//            ->hasPosts(1)
            ->create();
    }
}
