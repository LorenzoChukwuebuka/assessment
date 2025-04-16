<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a primary test user
        User::create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create a secondary test user
        User::create([
            'name'     => 'Another User',
            'email'    => 'another@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create additional users using the factory
        User::factory(3)->create();
    }
}