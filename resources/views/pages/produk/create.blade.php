@extends('layout.app')

@section('content')
<style>
    /* ==== Custom Styling (tanpa ubah fungsi form) ==== */
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
        transition: 0.3s ease;
    }

    .form-container:hover {
        transform: scale(1.01);
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
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #38b2ac;
        box-shadow: 0 0 0 0.2rem rgba(56, 178, 172, 0.25);
    }

    .btn-success {
        width: 100%;
        padding: 10px;
        font-weight: 600;
        border-radius: 10px;
        background: linear-gradient(90deg, #38b2ac, #319795);
        border: none;
        transition: 0.3s;
    }

    .btn-success:hover {
        background: linear-gradient(90deg, #2c7a7b, #285e61);
    }
</style>

<div class="form-container">
    <h2>Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>UMKM</label>
            <select name="umkm_id" class="form-control">
                @foreach($umkms as $umkm)
                    <option value="{{ $umkm->id }}">{{ $umkm->nama_umkm }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
