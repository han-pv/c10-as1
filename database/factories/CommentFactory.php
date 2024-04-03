<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{

    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $post = post::inRandomOrder()->first();
        $faker = Faker::create();
        $createdAt = $faker->dateTimeBetween($post->created_at, 'now');
        $updatedAt = $faker->dateTimeBetween($createdAt, 'now');
        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => $this->faker->paragraph(rand(1, 3)),
            'like_count' => $this->faker->numberBetween(0, 50),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
