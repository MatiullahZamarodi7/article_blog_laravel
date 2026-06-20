<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index(){
        $categoris = Category::all();
        return view("articles.SInglePage", compact("categoris"));
    }

    public function single($id){
        $categoris = Category::all();
        $latestArticles = Article::latest()->take(4)->get();
        $article = Article::findOrFail($id);
         return view('articles.SInglePage', compact('article', 'categoris', 'latestArticles'));
    }

}
