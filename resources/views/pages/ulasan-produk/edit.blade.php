@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Ulasan Produk</h3>

    <form action="{{ route('ulasan-produk.update',$ulasan->ulasan_id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Rating (1–5)</label>
            <input type="number" name="rating"
                   value="{{ $ulasan->rating }}"
                   min="1" max="5"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="3">
{{ $ulasan->komentar }}
            </textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('ulasan-produk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
