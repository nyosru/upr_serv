<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 123123,
            'email' => '1@ura.ura',
            //123123123
            'password' => '$2y$12$/HBMrpMw44RlXRs2/dclWuHAgdLX5.LlFOyly31/fIDdRB54gbnUm'
        ]);
        User::factory()
            ->count(5)
//            ->hasPosts(1)
            ->create();
    }
}
