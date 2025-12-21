@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Detail Pesanan</h3>

    <form action="{{ route('detail-pesanan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pesanan</label>
            <select name="pesanan_id" class="form-control" required>
                <option value="">-- Pilih Pesanan --</option>
                @foreach ($pesanan as $p)
                    <option value="{{ $p->pesanan_id }}">
                        {{ $p->pesanan_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Produk</label>
            <select name="produk_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produk as $pr)
                    <option value="{{ $pr->produk_id }}">
                        {{ $pr->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('detail-pesanan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
