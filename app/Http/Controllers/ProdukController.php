<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Umkm;
use App\Models\Media;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('umkm');

        if ($request->filled('search')) {
            $query->where('nama_produk', 'LIKE', "%{$request->search}%");
        }

        if ($request->filled('umkm_id')) {
            $query->where('umkm_id', $request->umkm_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $produks = $query->paginate(10)->withQueryString();
        $umkms   = Umkm::all();

        return view('pages.produk.index', compact('produks', 'umkms'));
    }

    public function create()
    {
        $umkms = Umkm::all();
        return view('pages.produk.create', compact('umkms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'umkm_id' => 'required|exists:umkm,umkm_id',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // INSERT tanpa media
        $produk = Produk::create(
            $request->except(['media_produk'])
        );

        $produk_id = $produk->produk_id;

        // SIMPAN SATU MEDIA
        $this->saveMedia($request, $produk_id);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $umkms  = Umkm::all();

        return view('pages.produk.edit', compact('produk', 'umkms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'umkm_id' => 'required|exists:umkm,umkm_id',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $produk = Produk::findOrFail($id);

        // UPDATE tanpa media
        $produk->update(
            $request->except(['media_produk'])
        );

        $produk_id = $produk->produk_id;

        // GANTI MEDIA (jika upload baru)
        $this->replaceMedia($request, $produk_id);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // HAPUS MEDIA
        Media::where('ref_table', 'produk')
             ->where('ref_id', $id)
             ->delete();

        Produk::destroy($id);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    // ============================================================
    // MEDIA HANDLER (SATU FILE)
    // ============================================================
    private function saveMedia($request, $produk_id)
    {
        if (!$request->hasFile('media_produk')) return;

        $file = $request->file('media_produk');
        $path = $file->store('uploads/produk', 'public');

        Media::create([
            'ref_table' => 'produk',
            'ref_id' => $produk_id,
            'file_url' => $path,
            'caption' => 'media_produk',
            'mime_type' => $file->getClientMimeType(),
            'sort_order' => 0,
        ]);
    }

    private function replaceMedia($request, $produk_id)
    {
        if (!$request->hasFile('media_produk')) return;

        Media::where('ref_table', 'produk')
             ->where('ref_id', $produk_id)
             ->delete();

        $this->saveMedia($request, $produk_id);
    }
}
