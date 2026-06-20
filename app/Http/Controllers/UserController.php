<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        $user = User::find($id);

        $articles = $user->articles;

        return view('user.profile', compact('articles', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('user.editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fileName = null;
        $user = User::find($id);
        $request->validate([
            'name' => 'required | min:4 | string',
            'about' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'image' => 'required|image',

        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $fileName);
        }

        $user->update([
            'name' => $request->name,
            'about' => $request->about,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $fileName,
        ]);

        return redirect()->route('profile.show', $user->id)->with('success', 'updated is successfuly seted!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('login')->with('success', 'the user'.''.$user->name.'deleted!');
    }
}
