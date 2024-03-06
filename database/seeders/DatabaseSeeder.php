<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'firstname' => 'Peter',
            'lastname' => 'Muthee',
            'dob' => 2001-03-01,
            'role' => 'admin',
            'phone' => '0722203396',
            'password' => Hash::make('@Pemu24agrifood#'),
            'email' => 'admin@pemuagrifood.com',

         ]);
    }
}
