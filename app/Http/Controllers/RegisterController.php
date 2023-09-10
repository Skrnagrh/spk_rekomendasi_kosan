<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // return redirect('/dashboard')->with('toast_success', 'Registrasi berhasil! Silakan Daftar.');
        if ($user) {
            // Registrasi berhasil, alihkan pengguna ke dashboard
            return redirect('/dashboard')->with('toast_success', 'Registrasi berhasil! Silakan Daftar.');
        } else {
            // Registrasi gagal, kembali ke halaman registrasi
            return back()->with('toast_error', 'Registrasi gagal! Silakan coba lagi.');
        }
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/dashboard')->with('toast_success', 'Registrasi berhasil! Anda berhasil masuk.');
        } else {
            return back()->with('toast_error', 'Registrasi gagal! Silakan coba lagi.');
        }
    }
}
