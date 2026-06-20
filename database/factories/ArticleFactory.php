<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            "title" => fake()->sentence(3),
            "slug" => fake()->slug(),
            "content" => fake()->paragraph(5),
            "user_id" => fake()->numberBetween(1, 30),
            "category_id" => fake()->numberBetween(1, 10),
        ];
    }
}
