@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Daftar Produk</h4>

        {{-- TOMBOL KE HALAMAN CREATE --}}
        <a href="{{ route('produk.create') }}" class="btn btn-primary">
            Tambah Produk
        </a>
    </div>

    <div class="card-body">

        {{-- FILTER --}}
        <form method="GET" class="row mb-4">
            <div class="col-md-4 mb-2">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari produk..." value="{{ request('search') }}">
            </div>

            <div class="col-md-3 mb-2">
                <select name="umkm_id" class="form-control">
                    <option value="">Semua UMKM</option>
                    @foreach ($umkms as $u)
                        <option value="{{ $u->umkm_id }}" {{ request('umkm_id') == $u->umkm_id ? 'selected' : '' }}>
                            {{ $u->nama_usaha }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <select name="status" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="col-md-2 mb-2">
                <button class="btn btn-dark w-100">Filter</button>
            </div>
        </form>

        {{-- CARD PRODUK --}}
        <div class="row">
            @foreach ($produks as $p)
                @php
                    $media = $p->media->first();
                    $isImage = $media && str_contains($media->mime_type, 'image');
                @endphp

                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">

                        {{-- MEDIA --}}
                        @if ($media)
                            @if ($isImage)
                                <img src="{{ asset('storage/' . $media->file_url) }}"
                                     class="card-img-top"
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <div class="p-3 text-center bg-light" style="height: 180px;">
                                    <a href="{{ asset('storage/' . $media->file_url) }}"
                                       target="_blank"
                                       class="btn btn-info mt-5">Lihat File</a>
                                </div>
                            @endif
                        @else
                            <div class="p-3 text-center bg-light text-muted"
                                 style="height: 180px; display:flex; align-items:center; justify-content:center;">
                                Tidak ada media
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nama_produk }}</h5>

                            <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                            <p class="mb-1"><strong>UMKM:</strong> {{ $p->umkm->nama_usaha }}</p>
                            <p class="mb-2">
                                <span class="badge {{ $p->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </p>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-between">

                            {{-- DETAIL --}}
                            <button class="btn btn-info btn-sm w-50 me-1"
                                data-bs-toggle="modal"
                                data-bs-target="#modalDetailProduk{{ $p->produk_id }}">
                                Detail
                            </button>

                            {{-- EDIT --}}
                            <a href="{{ route('produk.edit', $p->produk_id) }}"
                               class="btn btn-warning btn-sm w-50 me-1">Edit</a>

                            {{-- HAPUS --}}
                            <form action="{{ route('produk.destroy', $p->produk_id) }}"
                                  method="POST" class="w-50"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm w-100">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>

                {{-- MODAL DETAIL --}}
                <div class="modal fade" id="modalDetailProduk{{ $p->produk_id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Detail Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                @if ($media && $isImage)
                                    <img src="{{ asset('storage/' . $media->file_url) }}"
                                         class="w-100 mb-3"
                                         style="max-height:300px; object-fit:cover;">
                                @endif

                                <p><strong>Nama Produk:</strong> {{ $p->nama_produk }}</p>
                                <p><strong>Harga:</strong> Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                                <p><strong>UMKM:</strong> {{ $p->umkm->nama_usaha }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($p->status) }}</p>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $produks->links() }}
        </div>

    </div>
</div>
@endsection
