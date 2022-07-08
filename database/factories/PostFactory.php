<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cat_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'comment_id' => rand(1, 10),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'photo' => $this->faker->imageUrl,
        ];
    }
}
