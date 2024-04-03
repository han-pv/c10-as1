<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
//protected $model = Post::class;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $category = category::inRandomOrder()->first();
        $faker = Faker::create();
        $views = $faker->numberBetween(0, 50);
        $likes = $faker->numberBetween(0, $views);
        $createdAt = $faker->dateTimeBetween($user->created_at, 'now');
        $updatedAt = $faker->dateTimeBetween($createdAt, 'now');
        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $this->faker->sentence(rand(5, 10)),
            'content' => $this->faker->paragraph(rand(1, 3)),
            'view_count' => $views,
            'like_count' => $likes,
            'published_at' => $faker->optional(0.8)->dateTimeBetween($createdAt, 'now'),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
