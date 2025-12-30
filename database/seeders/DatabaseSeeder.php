<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Test1;
use App\Models\Test2;
use App\Models\Test3;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\Profile;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         
         Post::factory(10)->create();
         PostUserLike::factory(10)->create();
         Profile::factory(10)->create();
         Comment::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //Article::factory(10)->create();
        //Test1::factory(10)->create();
         //Test2::factory(5)->create();
         //Test3::factory(5)->create();

    }
}
