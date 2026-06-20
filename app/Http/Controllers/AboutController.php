<?php

namespace App\Http\Controllers;

use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = User::where('role', 'admin')->get();

        return view('articles.AboutUs', compact('abouts'));
    }
}
