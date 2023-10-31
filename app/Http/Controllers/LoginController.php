<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.inner-page.content.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials) && Auth()->user()->isAdmin == true) {
            $request->session()->regenerate();
            return redirect()->intended('backend');
        }
        else if(Auth::attempt($credentials) && Auth()->user()->isAdmin == false){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        else {
            return redirect('/login')->with('warning', 'The provided credentials do not match our records.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('frontend.inner-page.content.register');
    }

    public function signUp(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        $validateData['password'] = Hash::make($request->password);
        $validateData['remember_token'] = Str::random(10);
        $validateData['email_verified_at'] = now();

        User::create($validateData);
        return redirect('/login')->with('pesan', 'Register berhasil');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
