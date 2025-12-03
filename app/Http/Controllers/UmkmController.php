<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Media;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_usaha', 'LIKE', "%$keyword%")
                  ->orWhere('alamat', 'LIKE', "%$keyword%");
            });
        }

        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        $dataUmkm = $query->orderBy('umkm_id', 'DESC')
                          ->paginate(10)
                          ->withQueryString();

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

        // ⬅️ FIX PENTING – exclude file input
        $umkm = Umkm::create(
            $request->except(['foto_usaha', 'dokumen_izin', 'banner_promosi'])
        );

        $umkm_id = $umkm->umkm_id;

        // MEDIA
        $this->saveMedia($request, $umkm_id, 'foto_usaha');
        $this->saveMedia($request, $umkm_id, 'dokumen_izin');
        $this->saveMedia($request, $umkm_id, 'banner_promosi');

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

        // ⬅️ FIX PENTING – exclude file input
        $umkm->update(
            $request->except(['foto_usaha', 'dokumen_izin', 'banner_promosi'])
        );

        $umkm_id = $umkm->umkm_id;

        // REPLACE MEDIA
        $this->replaceMedia($request, $umkm_id, 'foto_usaha');
        $this->replaceMedia($request, $umkm_id, 'dokumen_izin');
        $this->replaceMedia($request, $umkm_id, 'banner_promosi');

        return redirect()->route('Umkm.index')->with('success', 'Data UMKM berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Media::where('ref_table', 'umkm')
             ->where('ref_id', $id)
             ->delete();

        Umkm::destroy($id);

        return redirect()->route('Umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }

    // ============================================================
    // MEDIA FUNCTIONS
    // ============================================================
    private function saveMedia($request, $umkm_id, $input_name)
    {
        if (!$request->hasFile($input_name)) return;

        $file = $request->file($input_name);
        $path = $file->store('uploads/umkm', 'public');

        Media::create([
            'ref_table' => 'umkm',
            'ref_id' => $umkm_id,
            'file_url' => $path,
            'caption' => $input_name,
            'mime_type' => $file->getClientMimeType(),
            'sort_order' => 0,
        ]);
    }

    private function replaceMedia($request, $umkm_id, $input_name)
    {
        if (!$request->hasFile($input_name)) return;

        Media::where('ref_table', 'umkm')
             ->where('ref_id', $umkm_id)
             ->where('caption', $input_name)
             ->delete();

        $this->saveMedia($request, $umkm_id, $input_name);
    }
}
