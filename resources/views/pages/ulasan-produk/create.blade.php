@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Ulasan Produk</h3>

    <form action="{{ route('ulasan-produk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="produk_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($produk as $p)
                    <option value="{{ $p->produk_id }}">
                        {{ $p->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (1–5)</label>
            <input type="number" name="rating" class="form-control"
                   min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('ulasan-produk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
