<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended();
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|unique:users|max:32',
            'password' => 'required',
        ]);

        User::create($credentials);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/firstrun');
        }
    }

    public function firstrun(Request $request) {
        $credentials = $request->validate([
            'display_name' => 'required'
        ]);

        $user = User::find(Auth::id());
        $user->display_name = $credentials['display_name'];
        $user->save();

        return redirect('/');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
