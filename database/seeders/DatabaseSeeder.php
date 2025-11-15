<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
       Admin::factory()->create([
        'name' => 'Admin',
        'email' => 'test@test.com'
       ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@example.com',
        ]);

        Job::factory(200)->create();
    }
}
