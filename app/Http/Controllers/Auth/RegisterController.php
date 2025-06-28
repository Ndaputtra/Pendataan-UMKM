<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth; // Tambahkan baris ini
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Pastikan ini diimport

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Ganti 'name' menjadi 'nama_lengkap' dalam aturan validasi
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255', // PERBAIKAN DI SINI
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            // Ganti 'name' menjadi 'nama_lengkap' saat membuat user
            'nama_lengkap' => $request->nama_lengkap, // PERBAIKAN DI SINI
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Setelah registrasi berhasil, login otomatis atau arahkan ke halaman login
        Auth::login($user);

        return redirect('/dashboard');
    }
}