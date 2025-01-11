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

        User::factory()->create([
            'role_id' => Role::ROLE_ADMIN,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Drc@1234'),
        ]);
    }
}
