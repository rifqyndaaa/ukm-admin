<?php
namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index(Request $request)
    {
        $query = DetailPesanan::with(['pesanan', 'produk']);

        // Filter berdasarkan pesanan
        if ($request->filled('pesanan_id')) {
            $query->where('pesanan_id', $request->pesanan_id);
        }

        // Filter berdasarkan produk
        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        // Pencarian berdasarkan nama produk
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('produk', function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%$search%");
            });
        }

        // Total subtotal untuk filter/search saat ini
        $totalSubtotal = (clone $query)->sum('subtotal');

        // Pagination 10 per halaman
        $detailPesanan = $query->orderBy('detail_id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.detail-pesanan.index', [
            'detailPesanan' => $detailPesanan,
            'pesanan'       => Pesanan::all(),
            'produk'        => Produk::all(),
            'totalSubtotal' => $totalSubtotal,
        ]);
    }

    public function create()
    {
        $pesanan = Pesanan::all();
        $produk  = Produk::all();

        return view('pages.detail-pesanan.create', compact('pesanan', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id'   => 'required|exists:pesanan,pesanan_id',
            'produk_id'    => 'required|exists:produk,produk_id',
            'qty'          => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric',
        ]);

        DetailPesanan::create([
            'pesanan_id'   => $request->pesanan_id,
            'produk_id'    => $request->produk_id,
            'qty'          => $request->qty,
            'harga_satuan' => $request->harga_satuan,
            'subtotal'     => $request->qty * $request->harga_satuan,
        ]);

        return redirect()->route('detail-pesanan.index')
                         ->with('success', 'Detail pesanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $detail = DetailPesanan::findOrFail($id);
        $pesanan = Pesanan::all();
        $produk  = Produk::all();

        return view('pages.detail-pesanan.edit', compact('detail', 'pesanan', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'qty'          => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric',
        ]);

        $detail = DetailPesanan::findOrFail($id);
        $detail->update([
            'qty'          => $request->qty,
            'harga_satuan' => $request->harga_satuan,
            'subtotal'     => $request->qty * $request->harga_satuan,
        ]);

        return redirect()->route('detail-pesanan.index')
                         ->with('success', 'Detail pesanan berhasil diupdate');
    }

    public function destroy($id)
    {
        DetailPesanan::findOrFail($id)->delete();
        return redirect()->route('detail-pesanan.index')
                         ->with('success', 'Detail pesanan berhasil dihapus');
    }
}
