<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Warga::query();

        // SEARCH (nama warga)
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where('nama', 'LIKE', "%$keyword%");
        }

        // FILTER JENIS KELAMIN
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // FILTER AGAMA
        if ($request->filled('agama')) {
            $query->where('agama', $request->agama);
        }

        // PAGINATION
        $warga = $query->paginate(10)->withQueryString();

        // Data dropdown untuk filter
        $listJenisKelamin = ['Laki-laki', 'Perempuan'];
        $listAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        return view('pages.warga.index', compact('warga', 'listJenisKelamin', 'listAgama'));
    }

    public function create()
    {
        $listJenisKelamin = ['Laki-laki', 'Perempuan'];
        $listAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        return view('pages.warga.create', compact('listJenisKelamin', 'listAgama'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required',
            'alamat' => 'nullable|string',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        $listJenisKelamin = ['Laki-laki', 'Perempuan'];
        $listAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        return view('pages.warga.edit', compact('warga', 'listJenisKelamin', 'listAgama'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required',
            'alamat' => 'nullable|string',
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data berhasil dihapus.');
    }
}

