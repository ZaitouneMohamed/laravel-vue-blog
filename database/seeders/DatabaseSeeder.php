<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Image::factory(50)->create();
        // \App\Models\User::factory(10)->create();
        // \App\Models\Categorie::factory(10)->create();
        // \App\Models\Post::factory(40)->create();
        // \App\Models\Comment::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
