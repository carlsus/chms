<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'gender' => 'Male',
            'user_type' => 'user',
            'built_in' => 1,
            'group_id' => 1,
            'status' => 'approved'
        ]);

        User::create([
            'name' => 'Default Leader',
            'email' => 'leader@leader.com',
            'password' => Hash::make('leader'),
            'gender' => 'Male',
            'user_type' => 'member',
            'built_in' => 1,
            'group_id' => 2,
            'status' => 'approved'
        ]);
    }
}
