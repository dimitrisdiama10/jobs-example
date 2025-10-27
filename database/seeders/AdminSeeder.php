<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'], // Αν υπάρχει ήδη, ενημέρωσέ τον
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
            ]
        );

        // Αν χρησιμοποιείς Filament Roles ή Spatie Permissions:
        // $admin->assignRole('admin');

        $this->command->info('✅ Admin user created: admin@test.com / admin');
    }
}
