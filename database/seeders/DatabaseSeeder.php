<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(50)
            ->create();

        $this->call([
            CategorySeeder::class,
        ]);

        Post::factory()
            ->count(200)
            ->create();

        Comment::factory()
            ->count(500)
            ->create();

    }
}
