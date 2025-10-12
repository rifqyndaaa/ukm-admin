<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ===============================
    // 1️⃣ Tampilkan Halaman Login
    // ===============================
    public function index()
    {
        return view('pages.login', ['title' => 'Login']);
    }

    // ===============================
    // 2️⃣ Logika Proses Login
    // ===============================
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Logika sederhana: username = nim dan password = nim
        if ($username === $password) {
            // Flashdata dan redirect ke Dashboard
            return redirect()->route('dashboard')->with('success', 'Selamat Datang Admin!');
        }

        // Jika gagal login
        return back()->with('error', 'Username atau Password salah!');
    }

    // ===============================
    // 3️⃣ Logika Proses Register
    // ===============================
    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'regex:/^[A-Za-z\s]+$/'], // tidak boleh ada angka
            'alamat' => 'required|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/'
            ],
            'confirm_password' => 'required|same:password'
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka.',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka.',
            'confirm_password.same' => 'Konfirmasi password tidak sama!'
        ]);

        // Simulasi: data tersimpan (bisa disimpan ke database jika sudah siap)
        return redirect()->route('login.page')->with('success', 'Registrasi berhasil! Silakan Login.');
    }
}
