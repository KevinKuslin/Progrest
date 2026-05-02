<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Show login page
    public function index()
    {
        return view('auth.login');
    }

    // Show register page
    public function registerForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:8|unique:users,username',
            'name' => 'required|string|min:6|max:12',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(6)->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Handle login
    public function login(Request $request)
    {
        // dd($request->all()); 

        $credentials = $request->validate([
            'login' => 'required|string', // can be username OR email
            'password' => 'required|string',
        ]);

        // Allow login via username OR email
        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) 
            ? 'email' 
            : 'username';

        if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors([
            'login' => 'Invalid credentials.'
        ])->onlyInput('login');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}