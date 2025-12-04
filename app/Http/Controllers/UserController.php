<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('foto')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->search}%")
                      ->orWhere('email', 'LIKE', "%{$request->search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('pages.datauser.index', compact('users'));
    }

    public function create()
    {
        return view('pages.datauser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,user',
            'foto'     => 'nullable|image|max:2048',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // simpan foto
        $this->saveMedia($request, $user->id, 'foto');

        return redirect()->route('User.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::with('foto')->findOrFail($id);
        return view('pages.datauser.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,user',
            'foto'  => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // replace foto
        $this->replaceMedia($request, $user->id, 'foto');

        return redirect()->route('User.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        Media::where('ref_table', 'users')
            ->where('ref_id', $id)
            ->where('caption', 'foto')
            ->delete();

        User::destroy($id);

        return redirect()->route('User.index')
            ->with('success', 'User berhasil dihapus');
    }

    // ============================================================
    // MEDIA HANDLER
    // ============================================================

    private function saveMedia($request, $id, $input)
    {
        if (!$request->hasFile($input)) return;

        $file = $request->file($input);
        $path = $file->store('uploads/user', 'public');

        Media::create([
            'ref_table' => 'users',
            'ref_id'    => $id,
            'file_url'  => $path,
            'caption'   => $input,
            'mime_type' => $file->getClientMimeType(),
            'sort_order'=> 0,
        ]);
    }

    private function replaceMedia($request, $id, $input)
    {
        if (!$request->hasFile($input)) return;

        Media::where('ref_table', 'users')
            ->where('ref_id', $id)
            ->where('caption', $input)
            ->delete();

        $this->saveMedia($request, $id, $input);
    }
}
