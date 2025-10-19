<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $dataUmkm = Umkm::all();
        return view('adminUmkm.index', compact('dataUmkm'));
    }

    public function create()
    {
        return view('adminUmkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        Umkm::create($request->all());
        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('adminUmkm.show', compact('umkm'));
    }

    public function edit(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('adminUmkm.edit', compact('umkm'));
    }

    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();
        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }
}
