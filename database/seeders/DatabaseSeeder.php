<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
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
        $this->call(AdminUserSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            
            'email' => 'admin2@gmail.com',
            'name' => 'Admin2',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'approved',
        ]);
    }
}
