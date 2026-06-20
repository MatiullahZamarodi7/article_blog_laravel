<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|min:3',
            'password' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('/')
                ->with(
                    'success',
                    'Login successfully mr:' . Auth::user()->name,
                );
        } else {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Login failed'
                );
        }

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}