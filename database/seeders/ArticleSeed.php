<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeed extends Seeder
{
    public function run(): void
    {
        Article::factory(30)->create();
    }
}
