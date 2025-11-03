<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input

        $request->validate([
            'email'    => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/', // wajib ada huruf kapital
            ],
        ], [
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 3 karakter!',
            'password.regex'    => 'Password harus mengandung huruf kapital!',
        ]);

        // 🔹 Contoh data user (disimulasikan)
        $users = [
            [
                'email'    => 'rifqi@gmail.com',
                'password' => 'UserABC', // password benar
                'name'     => 'rifqi',
            ],
        ];

        // Cek apakah email dan password cocok
        $found = collect($users)->first(function ($user) use ($request) {
            return $user['email'] === $request->email && $user['password'] === $request->password;
        });

        if ($found) {
            return redirect()->route('umkm.index')->with('success', 'Login berhasil! Selamat datang, ' . $found['name']);
        } else {
            return redirect()->back()->with('error', 'Email atau password salah!')->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Fungsi tambahan (masih kosong untuk sementara)
     */
    public function up()
    {
        // Nanti kamu bisa isi di sini sesuai kebutuhanmu
    }
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'password' => [
            'required',
            'min:3',
            'regex:/[A-Z]/', // harus mengandung huruf kapital
        ],
    ]);

    // Contoh simulasi penyimpanan user baru (belum database)
    return redirect()->route('login')
        ->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');
}
    public function logout(Request $request)
    {
        // Simulasi proses logout
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}

