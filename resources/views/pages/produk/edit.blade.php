@extends('layout.app')

@section('content')
<style>
    body {
        background: #f5f7fa;
        font-family: 'Poppins', sans-serif;
    }

    .form-container {
        max-width: 700px;
        background: #fff;
        margin: 50px auto;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 30px 40px;
    }

    h2 {
        font-weight: 600;
        color: #2d3748;
        text-align: center;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        color: #4a5568;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #cbd5e0;
    }

    .btn-success {
        width: 100%;
        padding: 10px;
        font-weight: 600;
        border-radius: 10px;
        background: linear-gradient(90deg, #38b2ac, #319795);
        border: none;
    }
</style>

<div class="form-container">
    <h2>Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>UMKM</label>
            <select name="umkm_id" class="form-control">
                @foreach($umkms as $umkm)
                    <option value="{{ $umkm->umkm_id }}"
                        {{ $produk->umkm_id == $umkm->umkm_id ? 'selected' : '' }}>
                        {{ $umkm->nama_usaha }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control"
                   value="{{ $produk->nama_produk }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control"
                   value="{{ $produk->harga }}">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control"
                   value="{{ $produk->stok }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $produk->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $produk->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
