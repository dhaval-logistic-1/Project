<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dhaval Parmar',
            'email' => 'dhaval@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'age' => 22,
            'percentage' => 85.5,
            'profileImage' => 'profile1.jpg',
            'date_of_birth' => '2002-05-10',
            'gender' => 'male',
            'userType' => 'student'
        ]);
    }
}
