<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class categoryController extends Controller
{
    public function show($id)
    {
        $latestArticles = Article::latest()->take(4)->get();

        $articles = Article::where('category_id', $id)
            ->with('user')
            ->get();

        $categoris = Category::all();

        return view(
            'articles.CategoryLimit',
            compact('articles', 'categoris', 'latestArticles')
        );
    }
}