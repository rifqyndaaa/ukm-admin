<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class DataMasyarakatController extends Controller
{
    /**
     * Tampilkan daftar warga.
     */
    public function index()
    {
        $warga = Warga::all();
        return view('.pages.warga.index', compact('warga'));
    }

    /**
     * Tampilkan form tambah data warga.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Simpan data warga baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp|max:20',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|max:50',
            'pekerjaan' => 'nullable|max:100',
            'telp' => 'nullable|max:20',
            'email' => 'nullable|email|max:100',
        ]);

        Warga::create($request->all());

        return redirect()->route('datamasyarakat.index')
            ->with('success', 'Data warga berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail warga.
     */
    public function show($id)
    {
        $warga = Warga::findOrFail($id);
        return view('datamasyarakat.show', compact('warga'));
    }

    /**
     * Tampilkan form edit warga.
     */
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Update data warga.
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp' => 'required|max:20|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|max:50',
            'pekerjaan' => 'nullable|max:100',
            'telp' => 'nullable|max:20',
            'email' => 'nullable|email|max:100',
        ]);

        $warga->update($request->all());

        return redirect()->route('datamasyarakat.index')
            ->with('success', 'Data warga berhasil diperbarui!');
    }

    /**
     * Hapus data warga.
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('datamasyarakat.index')
            ->with('success', 'Data warga berhasil dihapus!');
    }
}

