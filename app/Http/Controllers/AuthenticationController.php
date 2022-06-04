<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return back()->with('fail','We do not recognize your credentials');

    }

}
