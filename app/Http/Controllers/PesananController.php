<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::query();

        // SEARCH
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nomor_pesanan', 'LIKE', "%$keyword%")
                  ->orWhere('alamat_kirim', 'LIKE', "%$keyword%")
                  ->orWhere('status', 'LIKE', "%$keyword%");
            });
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER METODE BAYAR
        if ($request->filled('metode_bayar')) {
            $query->where('metode_bayar', $request->metode_bayar);
        }

        $dataPesanan = $query->orderBy('pesanan_id', 'DESC')
                            ->paginate(10)
                            ->withQueryString();

        return view('pages.pesanan.index', compact('dataPesanan'));
    }

    public function create()
    {
        return view('pages.pesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_pesanan' => 'required|string|max:50|unique:pesanan',
            'warga_id' => 'required|integer|exists:warga,warga_id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,proses,selesai,dibatalkan',
            'alamat_kirim' => 'required|string|max:500',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'metode_bayar' => 'required|in:tunai,transfer,kredit'
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pages.pesanan.show', compact('pesanan'));
    }

    public function edit(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pages.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, string $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $request->validate([
            'nomor_pesanan' => 'required|string|max:50|unique:pesanan,nomor_pesanan,' . $id . ',pesanan_id',
            'warga_id' => 'required|integer|exists:warga,warga_id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,proses,selesai,dibatalkan',
            'alamat_kirim' => 'required|string|max:500',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'metode_bayar' => 'required|in:tunai,transfer,kredit'
        ]);

        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
