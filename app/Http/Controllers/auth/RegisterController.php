<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $fileName = null;

        $request->validate([
            'name' => 'required|string|min:3',
            'about' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'image' => 'filled|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $fileName);
        }
        User::create([
            'name' => $request->name,
            'about' => $request->about,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $fileName,
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Account created successfully'
            );
    }
}
