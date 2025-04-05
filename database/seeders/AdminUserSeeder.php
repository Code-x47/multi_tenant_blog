<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   

     /*public function run(): void
     {
         // database/seeders/AdminUserSeeder.php
     }*/


public function run()
{
    User::updateOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Super Admin',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'status' => 'approved',
        ]
    );
}

    
}
