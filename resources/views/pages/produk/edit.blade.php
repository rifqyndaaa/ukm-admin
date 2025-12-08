@extends('layout.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold">
                <i class="fas fa-edit me-2 text-primary"></i>Edit Produk
            </h4>
            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- LEFT COLUMN --}}
                <div class="col-md-8">
                    <div class="card border-light mb-4">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-info-circle me-2"></i>Informasi Produk
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Pilih UMKM</label>
                                    <select name="umkm_id" class="form-select form-select-sm" required>
                                        <option value="">-- Pilih UMKM --</option>
                                        @foreach ($umkms as $u)
                                            <option value="{{ $u->umkm_id }}"
                                                {{ $u->umkm_id == $produk->umkm_id ? 'selected' : '' }}>
                                                {{ $u->nama_usaha }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Status Produk</label>
                                    <select name="status" class="form-select form-select-sm" required>
                                        <option value="aktif" {{ $produk->status == 'aktif' ? 'selected' : '' }}>
                                            <span class="badge bg-success">Aktif</span>
                                        </option>
                                        <option value="nonaktif" {{ $produk->status == 'nonaktif' ? 'selected' : '' }}>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        </option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small text-muted mb-1">Nama Produk</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        <input type="text" name="nama_produk"
                                               value="{{ old('nama_produk', $produk->nama_produk) }}"
                                               class="form-control form-control-sm"
                                               placeholder="Masukkan nama produk" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Harga Produk</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" step="0.01" name="harga"
                                               value="{{ old('harga', $produk->harga) }}"
                                               class="form-control form-control-sm"
                                               placeholder="0" min="0" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Stok Produk</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        <input type="number" name="stok"
                                               value="{{ old('stok', $produk->stok) }}"
                                               class="form-control form-control-sm"
                                               placeholder="0" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN --}}
                <div class="col-md-4">
                    <div class="card border-light mb-4">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-image me-2"></i>Media Produk
                            </h6>
                        </div>
                        <div class="card-body">
                            @php
                                $media = $produk->media->first();
                            @endphp

                            @if ($media)
                                <div class="mb-3">
                                    <label class="form-label small text-muted mb-2">Media Saat Ini</label>
                                    <div class="border rounded p-3 text-center bg-light">
                                        @if(str_contains($media->mime_type, 'image'))
                                            <img src="{{ asset('storage/' . $media->file_url) }}"
                                                 alt="Media Produk"
                                                 class="img-fluid rounded mb-2"
                                                 style="max-height: 150px;">
                                            <p class="small text-muted mb-2">
                                                <i class="fas fa-file-image me-1"></i>Gambar Produk
                                            </p>
                                        @else
                                            <div class="py-3">
                                                <i class="fas fa-file-alt fa-3x text-secondary mb-2"></i>
                                                <p class="small text-muted mb-2">File Dokumen</p>
                                            </div>
                                        @endif

                                        <a href="{{ asset('storage/' . $media->file_url) }}"
                                           target="_blank"
                                           class="btn btn-outline-info btn-sm w-100">
                                            <i class="fas fa-eye me-1"></i>Lihat File
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-light border text-center py-4 mb-3">
                                    <i class="fas fa-image fa-2x text-muted mb-3"></i>
                                    <p class="small text-muted mb-0">Belum ada media untuk produk ini</p>
                                </div>
                            @endif

                            <div>
                                <label class="form-label small text-muted mb-2">
                                    <i class="fas fa-upload me-1"></i>Upload Media Baru
                                    <span class="text-muted">(Opsional - untuk mengganti)</span>
                                </label>
                                <div class="input-group input-group-sm">
                                    <input type="file" name="media_produk" class="form-control form-control-sm">
                                </div>
                                <small class="text-muted mt-1 d-block">
                                    Format: Gambar (JPG, PNG) atau Dokumen (PDF). Maks: 5MB
                                </small>
                            </div>
                        </div>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="card border-light">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save me-1"></i>Update Produk
                                </button>
                                <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-times me-1"></i>Batal
                                </a>
                            </div>

                            <div class="mt-3 pt-3 border-top">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    ID Produk: <code>{{ $produk->produk_id }}</code>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- VALIDATION ERRORS --}}
            @if($errors->any())
                <div class="alert alert-danger border mt-4">
                    <h6 class="fw-bold mb-2">
                        <i class="fas fa-exclamation-triangle me-2"></i>Perbaiki Kesalahan Berikut:
                    </h6>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>

@push('styles')
<style>
    .form-select option[selected] {
        background-color: #e9ecef;
    }
    .card-header.bg-light {
        background-color: #f8f9fa !important;
    }
    .input-group-text {
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
</style>
@endpush

@endsection
