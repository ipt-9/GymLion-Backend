<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()
            ->count(20)
            ->create();

        User::first()->update([
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);

        Brand::factory()
            ->count(20)
            ->has(Tweet::factory()->count(30))
            ->create();

        Product::factory()
            ->count(50)
            ->create();

        Purchase::factory()
            ->count(10)
            ->create();

        Category::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        Category::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
