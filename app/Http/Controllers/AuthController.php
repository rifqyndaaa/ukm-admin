<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 🔹 TAMPILKAN FORM LOGIN
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    // 🔹 TAMPILKAN FORM REGISTER
    public function showRegisterForm()
    {
        return view('pages.auth.register');
    }

    // 🔹 PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 3 karakter!',
        ]);

        // Simulasi database (gunakan session)
        $users = session('users', []);

        // Cek user
        $found = collect($users)->first(function ($user) use ($request) {
            return $user['email'] === $request->email && $user['password'] === $request->password;
        });

        if ($found) {
            session(['login_user' => $found]);
            return redirect()->route('home')->with('success', 'Selamat datang, ' . $found['name']);
        } else {
            return back()->with('error', 'Email atau password salah!')->withInput();
        }
    }

    // 🔹 PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email',
            'password' => 'required|min:3|regex:/[A-Z]/', // harus ada huruf kapital
        ], [
            'name.required'     => 'Nama wajib diisi!',
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 3 karakter!',
            'password.regex'    => 'Password harus mengandung huruf kapital!',
        ]);

        $users = session('users', []);

        // Cek jika email sudah terdaftar
        if (collect($users)->contains('email', $request->email)) {
            return back()->with('error', 'Email sudah digunakan!')->withInput();
        }

        // Simpan user baru ke session
        $users[] = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ];

        session(['users' => $users]);

        return redirect()->route('login.form')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    // 🔹 LOGOUT
    public function logout()
    {
        session()->forget('login_user');
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}
