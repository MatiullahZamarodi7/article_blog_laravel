<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $lasrArticles = Article::latest('id')->limit(1)->first();

        return view('articles.homePage', compact('lasrArticles'));
    }
}
