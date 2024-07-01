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
        User::firstOrCreate(
        ['email' => 'ebrahim3zazy@gmail.com'],
        [
            'name' => 'Ibrahim Azazy',
            'password' => Hash::make('123456789'),
        ]);
        User::factory(10)->create();
    }
}
