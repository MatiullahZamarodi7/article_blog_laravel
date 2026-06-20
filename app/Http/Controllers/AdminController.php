<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CalledForUs;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $is_admin = User::where('role', 'admin')->first();
        $articles = Article::all();
        $category = Category::all();
        $messages = CalledForUs::all();
        $latestArticles = Article::latest()->take(6)->get();

        return view('user.admin.adminPanel', compact('users', 'articles', 'category', 'latestArticles', 'is_admin', 'messages'));
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
        //
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
        $user = User::find($id);

        return view('user.admin.editProfile', compact('user'));
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
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'user '.' '.$user->name.' '.'successfuly deleted !');
    }
}
