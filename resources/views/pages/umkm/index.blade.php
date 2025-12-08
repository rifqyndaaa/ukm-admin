@extends('layout.app')
@section('content')

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-primary text-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1"><i class="fas fa-store me-3"></i>Data UMKM</h2>
                    <p class="mb-0 opacity-75">Daftar Usaha Mikro, Kecil, dan Menengah</p>
                </div>
                <div class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                    <i class="fas fa-chart-bar me-1"></i> {{ $dataUmkm->total() }} Data
                </div>
            </div>
        </div>

        <div class="card-body p-4">

            <!-- Header Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h4 class="mb-0 text-dark">Daftar UMKM</h4>
                    <p class="text-muted mb-0">Kelola data usaha dengan mudah</p>
                </div>
                <a href="{{ route('Umkm.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 py-3 shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i>Tambah UMKM Baru
                </a>
            </div>

            <!-- FILTER -->
            <div class="card border-0 shadow-sm mb-5 rounded-4">
                <div class="card-body p-4">
                    <h5 class="card-title text-dark mb-3">
                        <i class="fas fa-filter me-2 text-primary"></i>Filter & Pencarian
                    </h5>
                    <form method="GET" class="mb-0">
                        <div class="row g-3">

                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-pill">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control border-start-0 rounded-end-pill"
                                        placeholder="Cari nama usaha, alamat, atau deskripsi...">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-pill">RT</span>
                                    <input type="number" name="rt" value="{{ request('rt') }}"
                                        class="form-control border-start-0 rounded-end-pill" placeholder="RT">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-pill">RW</span>
                                    <input type="number" name="rw" value="{{ request('rw') }}"
                                        class="form-control border-start-0 rounded-end-pill" placeholder="RW">
                                </div>
                            </div>

                            <div class="col-md-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-50 rounded-pill px-4">
                                    <i class="fas fa-filter me-1"></i>Terapkan
                                </button>
                                <a href="{{ route('Umkm.index') }}" class="btn btn-outline-secondary w-50 rounded-pill px-4">
                                    <i class="fas fa-redo me-1"></i>Reset
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- CARD VIEW -->
            @if($dataUmkm->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="cardView">
                @foreach ($dataUmkm as $item)
                <div class="col">
                    <div class="card card-umkm h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-lift">

                        @php
                            $media = \App\Models\Media::where('ref_table', 'umkm')
                                        ->where('ref_id', $item->umkm_id)
                                        ->where('caption', 'foto_usaha')
                                        ->first();
                        @endphp

                        <div class="position-relative">
                            @if ($media)
                                <img src="{{ asset('storage/'.$media->file_url) }}"
                                     class="card-img-top umkm-image"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-gradient-light d-flex align-items-center justify-content-center"
                                     style="height: 200px;">
                                    <i class="fas fa-store fa-4x text-muted opacity-25"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                    <i class="fas fa-map-marker-alt me-1"></i>RT {{ $item->rt }}/RW {{ $item->rw }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold mb-2">{{ $item->nama_usaha }}</h5>
                            <p class="text-muted mb-1">
                                <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                <small>{{ Str::limit($item->alamat, 50) }}</small>
                            </p>
                            <p class="text-secondary mb-3" style="font-size: 0.95rem;">
                                {{ Str::limit($item->deskripsi, 100) }}
                            </p>

                            <div class="mt-auto pt-3 border-top">
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="text-muted">
                                        <i class="far fa-calendar me-1"></i>
                                        <small>{{ $item->created_at->translatedFormat('d F Y') }}</small>
                                    </div>

                                    <div class="btn-group btn-group-sm">

                                        <!-- TOMBOL DETAIL -->
                                        <button class="btn btn-outline-info rounded-start-pill px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->umkm_id }}">
                                            <i class="fas fa-eye"></i>
                                            <span class="d-none d-md-inline ms-1">Detail</span>
                                        </button>

                                        <!-- EDIT -->
                                        <a href="{{ route('Umkm.edit', $item->umkm_id) }}"
                                           class="btn btn-outline-warning px-3">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-md-inline ms-1">Edit</span>
                                        </a>

                                        <!-- HAPUS -->
                                        <form action="{{ route('Umkm.destroy', $item->umkm_id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger rounded-end-pill px-3">
                                                <i class="fas fa-trash-alt"></i>
                                                <span class="d-none d-md-inline ms-1">Hapus</span>
                                            </button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============= MODAL DETAIL ============= -->
                <div class="modal fade" id="detailModal{{ $item->umkm_id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content rounded-4 shadow-lg">

                            <div class="modal-header bg-primary text-white rounded-top-4">
                                <h5 class="modal-title">
                                    <i class="fas fa-info-circle me-2"></i>Detail UMKM
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body p-4">

                                @php
                                    $mediaDetail = \App\Models\Media::where('ref_table', 'umkm')
                                        ->where('ref_id', $item->umkm_id)
                                        ->where('caption', 'foto_usaha')
                                        ->first();
                                @endphp

                                <div class="text-center mb-4">
                                    @if ($mediaDetail)
                                        <img src="{{ asset('storage/'.$mediaDetail->file_url) }}"
                                             class="img-fluid rounded-3 shadow-sm"
                                             style="max-height: 250px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 p-5">
                                            <i class="fas fa-store fa-4x text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <h4 class="fw-bold text-primary mb-3">{{ $item->nama_usaha }}</h4>

                                <table class="table table-borderless">
                                    <tr>
                                        <th width="150">Nama Pemilik</th>
                                        <td>{{ $item->nama_pemilik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $item->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT / RW</th>
                                        <td>{{ $item->rt }} / {{ $item->rw }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $item->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $item->deskripsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Input</th>
                                        <td>{{ $item->created_at->translatedFormat('d F Y') }}</td>
                                    </tr>
                                </table>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i>Tutup
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============= END MODAL DETAIL ============= -->

                @endforeach
            </div>

            @else
            <!-- Empty state -->
            <div class="text-center py-5 my-5">
                <i class="fas fa-store fa-4x text-muted opacity-25 mb-4"></i>
                <h4 class="text-muted mb-3">Belum ada data UMKM</h4>
                <a href="{{ route('Umkm.create') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-plus me-2"></i>Tambah UMKM Pertama
                </a>
            </div>
            @endif

            <!-- Pagination -->
            @if($dataUmkm->hasPages())
            <div class="mt-5 pt-4 border-top">
                <nav aria-label="Navigasi halaman" class="d-flex justify-content-center">
                    {{ $dataUmkm->links('pagination::bootstrap-5') }}
                </nav>
                <div class="text-center text-muted mt-2">
                    <small>Menampilkan {{ $dataUmkm->firstItem() }} - {{ $dataUmkm->lastItem() }} dari {{ $dataUmkm->total() }} data</small>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>

<style>
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .card-umkm {
        border: 1px solid rgba(0,0,0,0.08);
    }
    .bg-gradient-light {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
            new bootstrap.Tooltip(el);
        });
    });
</script>

@endsection
