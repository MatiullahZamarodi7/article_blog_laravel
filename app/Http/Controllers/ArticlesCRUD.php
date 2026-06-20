<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.createArticle');
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
    public function store(Request $request)
    {
        $fileName = null;
        $request->validate([
            'title' => 'required|min:3|string',
            'content' => 'required|min:3|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('article/images'), $fileName);
        }
        Article::create([
            'title' => $request->title,
            'slug' => $request->title,
            'content' => $request->content,
            'image' => $fileName,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect('/')->with('success', 'مقاله با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}