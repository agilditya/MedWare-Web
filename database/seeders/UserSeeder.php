<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'agilditya',
            'email' => 'agilditya@medware.com',
            'password' => Hash::make('agilditya'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'someone',
            'email' => 'someone12@medware.com',
            'password' => Hash::make('someone12'),
            'role' => 'staff',
        ]);
    }
}