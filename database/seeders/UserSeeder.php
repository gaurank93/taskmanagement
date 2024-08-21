<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');
        $users = [
            [
                'name' => 'Rakesh User',
                'email' => 'rakesh@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'John user',
                'email' => 'john@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Doe user',
                'email' => 'doe@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];
        foreach ($users as $userData) {
            $user = User::create($userData);
            $user->assignRole('user');
        }
    }
}
