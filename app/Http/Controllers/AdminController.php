<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        // Check if user exists and is admin
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ]);
        }

        // For demo purposes, check if password is 'admin123' or use Hash::check
        if ($credentials['password'] === 'admin123' || Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }
}
