@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>UMKM</label>
            <select name="umkm_id" class="form-control">
                @foreach($umkms as $umkm)
                    <option value="{{ $umkm->id }}" {{ $produk->umkm_id == $umkm->id ? 'selected' : '' }}>
                        {{ $umkm->nama_umkm }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" value="{{ $produk->harga }}">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $produk->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $produk->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
