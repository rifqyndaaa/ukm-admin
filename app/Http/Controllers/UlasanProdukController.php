<?php
namespace App\Http\Controllers;

use App\Models\UlasanProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = UlasanProduk::with(['produk', 'warga']);

        // Filter berdasarkan produk
        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        // Search berdasarkan komentar atau nama pelanggan
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('komentar', 'like', "%$search%")
                  ->orWhereHas('warga', function($q2) use ($search) {
                      $q2->where('nama', 'like', "%$search%");
                  });
            });
        }

        // Pagination, 10 data per halaman
        $ulasan = $query->orderBy('ulasan_id', 'desc')->paginate(10);
        $produk = Produk::all();

        return view('pages.ulasan-produk.index', compact('ulasan', 'produk'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('pages.ulasan-produk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,produk_id',
            'rating'    => 'required|integer|min:1|max:5',
            'komentar'  => 'nullable|string',
        ]);

        UlasanProduk::create([
            'produk_id' => $request->produk_id,
            'warga_id'  => Auth::user()->warga_id,
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->route('ulasan-produk.index')
                         ->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ulasan = UlasanProduk::findOrFail($id);
        $produk = Produk::all();
        return view('pages.ulasan-produk.edit', compact('ulasan', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $ulasan = UlasanProduk::findOrFail($id);

        $request->validate([
            'produk_id' => 'required|exists:produks,produk_id',
            'rating'    => 'required|integer|min:1|max:5',
            'komentar'  => 'nullable|string',
        ]);

        $ulasan->update([
            'produk_id' => $request->produk_id,
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->route('ulasan-produk.index')
                         ->with('success', 'Ulasan berhasil diperbarui');
    }

    public function destroy($id)
    {
        UlasanProduk::destroy($id);

        return redirect()->route('ulasan-produk.index')
                         ->with('success', 'Ulasan berhasil dihapus');
    }
}
