<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'user_type' => 'admin',
        ],

        [
            'name' => 'user1',
            'email' => 'user1@user.com',
            'password' => Hash::make('user1'),
            'user_type' => 'user',
        ],
        [
            'name' => 'user2',
            'email' => 'user2@user.com',
            'password' => Hash::make('user2'),
            'user_type' => 'user',
        ]);

        }
}
