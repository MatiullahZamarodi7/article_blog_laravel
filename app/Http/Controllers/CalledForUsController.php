<?php

namespace App\Http\Controllers;

use App\Models\CalledForUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalledForUsController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('articles.calledForUs', compact('user'));

    }

    public function messgesCard()
    {
        $messages = CalledForUs::all();

        return view('user.admin.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'descriptions' => 'required',
        ]);
        CalledForUs::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'title' => $request->title,
            'descriptions' => $request->descriptions,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/')->with('success', 'your message is successfuly sended !');

    }

    public function delete($id)
    {
        $message = CalledForUs::find($id);
        $message->delete();

        return back()->with('success', 'the message is deleted successfuly !');
    }

    public function edit(string $id)
    {
        $messages = CalledForUs::find($id);

        return view('articles.EditeCalledForUs', compact('messages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = CalledForUs::find($id);
        $request->validate([
            'title' => 'required',
            'descriptions' => 'required',
        ]);

        $message->update([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'title' => $request->title,
            'descriptions' => $request->descriptions,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('called.messgesCard')->with('success', 'the called message successfuly updated !');
    }
}
