<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_MAIL'),
            'password' => bcrypt(env('ADMIN_PASS')),
        ]);
    }
}
