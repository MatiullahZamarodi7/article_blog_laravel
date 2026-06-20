<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $latestArticles = Article::latest()->take(4)->get();
        $categoris = Category::all();

        return view('articles.Articles', compact('articles', 'categoris', 'latestArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        return view('articles.EditArticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fileName = null;
        $article = Article::find($id);
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('article/images'), $fileName);
        }
        $article->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $fileName,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'article is successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/')->with('success', 'Article deleted is successfuly');
    }
}
