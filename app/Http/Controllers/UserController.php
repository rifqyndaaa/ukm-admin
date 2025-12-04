<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Tampilkan semua user + search + pagination
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                      ->orWhere('email', 'LIKE', "%$search%");
            })
            ->with('foto') // supaya foto ikut keambil
            ->orderBy('id', 'desc')
            ->paginate(100)
            ->appends(['search' => $search]);

        return view('pages.datauser.index', compact('users', 'search'));
    }

    // Form tambah user
    public function create()
    {
        return view('pages.datauser.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto'     => 'nullable|image|max:2048'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $path = $file->store('uploads/user', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_url'  => $path,
                'caption'   => 'Foto Profil',
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 1,
            ]);
        }

        return redirect()->route('User.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // Form edit user
    public function edit($id)
    {
        $user = User::with('foto')->findOrFail($id);
        return view('pages.datauser.create', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto'  => 'nullable|image|max:2048'
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Upload baru (replace)
        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            $old = $user->foto;
            if ($old) {
                if (Storage::disk('public')->exists($old->file_url)) {
                    Storage::disk('public')->delete($old->file_url);
                }
                $old->delete();
            }

            // Upload baru
            $file = $request->file('foto');
            $path = $file->store('uploads/user', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_url'  => $path,
                'caption'   => 'Foto Profil',
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 1,
            ]);
        }

        return redirect()->route('User.index')
            ->with('success', 'User berhasil diperbarui');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto media
        $media = $user->foto;
        if ($media) {
            if (Storage::disk('public')->exists($media->file_url)) {
                Storage::disk('public')->delete($media->file_url);
            }
            $media->delete();
        }

        $user->delete();

        return redirect()->route('User.index')
            ->with('success', 'User berhasil dihapus');
    }
}
