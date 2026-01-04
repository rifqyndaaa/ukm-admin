@extends('layout.app')

@section('content')
<style>
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 5px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 1.8rem;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffc107; /* kuning bootstrap */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Ulasan Produk</h5>
                </div>

                <div class="card-body">

                    {{-- VALIDATION ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ulasan-produk.store') }}" method="POST">
                        @csrf

                        {{-- PRODUK --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Produk</label>
                            <select name="produk_id" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach($produk as $p)
                                    <option value="{{ $p->produk_id }}"
                                        {{ old('produk_id') == $p->produk_id ? 'selected' : '' }}>
                                        {{ $p->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- RATING BINTANG --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Rating</label>

                            <div class="star-rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio"
                                           id="star{{ $i }}"
                                           name="rating"
                                           value="{{ $i }}"
                                           {{ old('rating',3) == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}">★</label>
                                @endfor
                            </div>

                            <small class="text-muted">Klik bintang untuk memberi rating</small>
                        </div>

                        {{-- KOMENTAR --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Komentar</label>
                            <textarea name="komentar"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Tulis ulasan produk...">{{ old('komentar') }}</textarea>
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ulasan-produk.index') }}"
                               class="btn btn-outline-secondary">
                                Kembali
                            </a>

                            <button class="btn btn-success px-4">
                                Simpan Ulasan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
