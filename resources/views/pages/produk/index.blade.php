@extends('layout.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
        <h4 class="mb-0 fw-bold">
            <i class="fas fa-boxes me-2 text-primary"></i>Daftar Produk
        </h4>

        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle me-1"></i>Tambah Produk
        </a>
    </div>

    <div class="card-body p-4">

        {{-- FILTER SECTION --}}
        <div class="card border-light mb-4">
            <div class="card-body py-3">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label small text-muted">Cari Produk</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control form-control-sm"
                                   placeholder="Masukkan nama produk..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Filter UMKM</label>
                        <select name="umkm_id" class="form-select form-select-sm">
                            <option value="">Semua UMKM</option>
                            @foreach ($umkms as $u)
                                <option value="{{ $u->umkm_id }}" {{ request('umkm_id') == $u->umkm_id ? 'selected' : '' }}>
                                    {{ $u->nama_usaha }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label small text-muted">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-dark btn-sm w-100">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                    </div>

                    <div class="col-md-1">
                        @if(request()->has('search') || request()->has('umkm_id') || request()->has('status'))
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm w-100"
                               title="Reset Filter">
                                <i class="fas fa-redo"></i>
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- PRODUCT COUNT --}}
        @if($produks->total() > 0)
            <div class="alert alert-light border mb-4 py-2">
                <small class="text-muted">
                    <i class="fas fa-info-circle me-1"></i>Menampilkan <strong>{{ $produks->count() }}</strong> dari <strong>{{ $produks->total() }}</strong> produk
                </small>
            </div>
        @endif

        {{-- PRODUCT CARDS --}}
        @if($produks->count() > 0)
            <div class="row g-4">
                @foreach ($produks as $p)
                    @php
                        $media = $p->media->first();
                        $isImage = $media && str_contains($media->mime_type, 'image');
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card product-card h-100 border hover-shadow-sm transition-all">
                            {{-- MEDIA --}}
                            <div class="position-relative" style="height: 200px; overflow: hidden;">
                                @if ($media)
                                    @if ($isImage)
                                        <img src="{{ asset('storage/' . $media->file_url) }}"
                                             class="card-img-top h-100 w-100"
                                             style="object-fit: cover;"
                                             alt="{{ $p->nama_produk }}">
                                    @else
                                        <div class="h-100 d-flex flex-column align-items-center justify-content-center bg-light">
                                            <i class="fas fa-file-alt fa-3x text-secondary mb-2"></i>
                                            <small class="text-muted">File Dokumen</small>
                                            <a href="{{ asset('storage/' . $media->file_url) }}"
                                               target="_blank"
                                               class="btn btn-outline-info btn-sm mt-2">
                                                Lihat File
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="h-100 d-flex align-items-center justify-content-center bg-light text-muted">
                                        <div class="text-center">
                                            <i class="fas fa-image fa-2x mb-2"></i>
                                            <p class="small mb-0">Tidak ada media</p>
                                        </div>
                                    </div>
                                @endif

                                {{-- STATUS BADGE --}}
                                <span class="position-absolute top-0 end-0 m-2">
                                    <span class="badge {{ $p->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </span>
                            </div>

                            <div class="card-body">
                                <h6 class="card-title fw-bold text-truncate" title="{{ $p->nama_produk }}">
                                    {{ $p->nama_produk }}
                                </h6>

                                <div class="mb-2">
                                    <small class="text-muted d-block">
                                        <i class="fas fa-tag me-1"></i>
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="fas fa-store me-1"></i>
                                        {{ Str::limit($p->umkm->nama_usaha, 25) }}
                                    </small>
                                </div>
                            </div>

                            <div class="card-footer bg-white border-top-0 pt-0">
                                <div class="d-flex gap-2">
                                    {{-- DETAIL BUTTON --}}
                                    <button class="btn btn-outline-info btn-sm flex-fill"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetailProduk{{ $p->produk_id }}">
                                        <i class="fas fa-eye me-1"></i>Detail
                                    </button>

                                    {{-- EDIT BUTTON --}}
                                    <a href="{{ route('produk.edit', $p->produk_id) }}"
                                       class="btn btn-outline-warning btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>

                                    {{-- DELETE BUTTON --}}
                                    <form action="{{ route('produk.destroy', $p->produk_id) }}"
                                          method="POST"
                                          class="d-inline flex-fill"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ addslashes($p->nama_produk) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modalDetailProduk{{ $p->produk_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">
                                        <i class="fas fa-info-circle me-2 text-primary"></i>Detail Produk
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        {{-- MEDIA --}}
                                        @if ($media && $isImage)
                                            <div class="col-md-6 mb-3">
                                                <div class="border rounded overflow-hidden">
                                                    <img src="{{ asset('storage/' . $media->file_url) }}"
                                                         class="img-fluid"
                                                         alt="{{ $p->nama_produk }}">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="{{ $media && $isImage ? 'col-md-6' : 'col-12' }}">
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span class="fw-bold">Nama Produk</span>
                                                    <span>{{ $p->nama_produk }}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span class="fw-bold">Harga</span>
                                                    <span class="text-success fw-bold">
                                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span class="fw-bold">UMKM</span>
                                                    <span>{{ $p->umkm->nama_usaha }}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span class="fw-bold">Status</span>
                                                    <span class="badge {{ $p->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($p->status) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a href="{{ route('produk.edit', $p->produk_id) }}"
                                       class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            @if($produks->hasPages())
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Halaman {{ $produks->currentPage() }} dari {{ $produks->lastPage() }}
                        </small>
                        <div>
                            {{ $produks->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            @endif

        @else
            {{-- EMPTY STATE --}}
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-box-open fa-4x text-muted"></i>
                </div>
                <h5 class="text-muted mb-3">Belum ada produk</h5>
                <p class="text-muted mb-4">Tambahkan produk pertama Anda untuk mulai menampilkan di sini</p>
                <a href="{{ route('produk.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Produk Pertama
                </a>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .hover-shadow-sm:hover {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush

@endsection
