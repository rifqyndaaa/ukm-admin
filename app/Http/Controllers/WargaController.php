<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        return view('pages.warga.index', compact('warga'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
