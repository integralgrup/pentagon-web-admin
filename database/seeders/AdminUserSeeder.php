<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'akin@pentagon.com'],
            [
                'name' => 'Akın VURAL',
                'password' => Hash::make('akin*12*34*67'), // change to a secure password!
                //'is_admin' => true, // optional if you add is_admin column
            ]
        );
    }
}
