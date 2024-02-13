<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Usman Latif',
            'email' => 'voters@insaf.com',
            'password' => Hash::make('password@306'),
            'remember_token' => Str::random(10),
        ]);

        // \App\Models\Voter::factory(500)->create();
    }
}
