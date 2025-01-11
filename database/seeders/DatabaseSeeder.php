<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // The condition to find the user
            [
                'role_id' => Role::ROLE_ADMIN,
                'status' => Role::ACTIVE_USER,
                'name' => 'Admin',
                'password' => Hash::make('Drc@1234'),
            ]
        );
    }
}
