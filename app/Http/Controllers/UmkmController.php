<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query();

        // -------------------------
        // 🔍 SEARCH
        // -------------------------
        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('nama_usaha', 'LIKE', "%$keyword%")
                  ->orWhere('alamat', 'LIKE', "%$keyword%");
            });
        }

        // -------------------------
        // 🔎 FILTER (RT / RW)
        // -------------------------
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        // -------------------------
        // 📄 PAGINATION
        // -------------------------
        $dataUmkm = $query->paginate(10)->withQueryString();

        return view('pages.umkm.index', compact('dataUmkm'));
    }

    public function create()
    {
        return view('pages.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        Umkm::create($request->all());
        return redirect()->route('Umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('pages.umkm.show', compact('umkm'));
    }

    public function edit(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('pages.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('Umkm.index')->with('success', 'Data UMKM berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();
        return redirect()->route('Umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }
}
