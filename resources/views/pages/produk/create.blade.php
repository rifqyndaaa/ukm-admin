@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Produk</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Pilih UMKM</label>
                <select name="umkm_id" class="form-control" required>
                    <option value="">-- Pilih UMKM --</option>
                    @foreach ($umkms as $u)
                        <option value="{{ $u->umkm_id }}">{{ $u->nama_usaha }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Media Produk (Gambar/Dokumen)</label>
                <input type="file" name="media_produk" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
