<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Menampilkan form login admin
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Memproses login admin
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Menampilkan dashboard admin
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Memproses logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
} 