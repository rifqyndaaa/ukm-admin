<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Media;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with('media');

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nomor_pesanan', 'LIKE', "%$keyword%")
                  ->orWhere('alamat_kirim', 'LIKE', "%$keyword%")
                  ->orWhere('status', 'LIKE', "%$keyword%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

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

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pesanan = Pesanan::with(['media', 'detailPesanan'])
                    ->findOrFail($id);

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

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        Pesanan::findOrFail($id)->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    // UPLOAD RESI PEMBAYARAN
    public function uploadResi(Request $request, $pesanan_id)
    {
        $request->validate([
            'resi' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('resi');
        $path = $file->store('resi_pembayaran', 'public');

        Media::create([
            'ref_table' => 'pesanan',
            'ref_id'    => $pesanan_id,
            'file_url'  => $path,
            'caption'   => 'Bukti Pembayaran',
            'mime_type' => $file->getClientMimeType(),
            'sort_order'=> 1,
        ]);

        return back()->with('success', 'Resi berhasil diupload');
    }
}
