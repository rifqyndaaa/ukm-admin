@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Produk</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Pilih UMKM</label>
                <select name="umkm_id" class="form-control" required>
                    @foreach ($umkms as $u)
                        <option value="{{ $u->umkm_id }}"
                            {{ $u->umkm_id == $produk->umkm_id ? 'selected' : '' }}>
                            {{ $u->nama_usaha }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ $produk->harga }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="aktif" {{ $produk->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $produk->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Media Produk (Upload baru bila ingin mengganti)</label>
                <input type="file" name="media_produk" class="form-control">
            </div>

            @php
                $media = $produk->media->first();
            @endphp

            @if ($media)
                <div class="mb-3">
                    <label class="form-label">Media Saat Ini</label><br>

                    @if(str_contains($media->mime_type, 'image'))
                        <img src="{{ asset('storage/' . $media->file_url) }}"
                             alt="Media Produk" class="img-thumbnail" width="200">
                    @else
                        <a href="{{ asset('storage/' . $media->file_url) }}" target="_blank" class="btn btn-info">
                            Lihat File
                        </a>
                    @endif
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
