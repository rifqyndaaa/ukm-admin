@extends('layout.app')
@section('content')
   <div class="container mt-4">


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Enhanced UMKM Data Section -->
      <div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-gradient-primary text-white text-center py-3">
                <h2 class="mb-0"><i class="fas fa-store me-2"></i>Data UMKM</h2>
            </div>
            <div class="card-body">
                <!-- Tombol Tambah UMKM -->
                <a href="{{ route('create') }}" class="btn btn-primary mb-4 rounded-pill px-4 py-2 shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i>Tambah UMKM
                </a>

                <!-- Toggle View -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="btn-group" role="group">
                        <a href="{{ request()->fullUrlWithQuery(['view' => 'table']) }}" class="btn btn-outline-primary">
                            <i class="fas fa-table me-1"></i> Tabel
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['view' => 'card']) }}" class="btn btn-primary">
                            <i class="fas fa-th-large me-1"></i> Kartu
                        </a>
                    </div>
                </div>

                <!-- Tampilan Kartu UMKM -->
                <div class="row" id="cardView">
                    @foreach ($dataUmkm as $item)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card card-umkm shadow-sm border-0 h-100">
                            <!-- Badge Kategori -->
                            <span class="badge bg-info category-badge">{{ $item->kategori }}</span>

                            <!-- Foto Usaha -->
                            @if ($item->foto_usaha)
                            <img src="{{ asset('storage/' . $item->foto_usaha) }}" class="card-img-top umkm-image" alt="{{ $item->nama_usaha }}">
                            @else
                            <div class="card-img-top umkm-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-store fa-3x text-muted"></i>
                            </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <!-- Nama Usaha -->
                                <h5 class="card-title text-primary">{{ $item->nama_usaha }}</h5>

                                <!-- Pemilik -->
                                <p class="card-text mb-1">
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>Pemilik: {{ $item->pemilik_warga_id }}
                                    </small>
                                </p>

                                <!-- Alamat -->
                                <p class="card-text mb-1">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>Alamat: {{ $item->alamat }}, RT {{ $item->rt }}/RW {{ $item->rw }}
                                    </small>
                                </p>

                                <!-- Kontak -->
                                <p class="card-text mb-2 contact-info">
                                    <small class="text-muted">
                                        <i class="fas fa-phone me-1"></i>Kontak: {{ $item->kontak }}
                                    </small>
                                </p>

                                <!-- Deskripsi -->
                                <p class="card-text description">{{ $item->deskripsi }}</p>

                                <!-- Dokumen dan Banner -->
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            @if ($item->dokumen_izin)
                                            <a href="{{ asset('storage/' . $item->dokumen_izin) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fas fa-file-alt me-1"></i>Dokumen
                                            </a>
                                            @else
                                            <span class="text-muted small"><i class="fas fa-file me-1"></i>Tidak ada dokumen</span>
                                            @endif
                                        </div>

                                        @if ($item->banner_promosi)
                                        <img src="{{ asset('storage/' . $item->banner_promosi) }}" alt="Banner" width="40" class="img-thumbnail rounded" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . $item->banner_promosi) }}" style="cursor: pointer;">
                                        @endif
                                    </div>

                                    <!-- Tanggal dan Aksi -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>{{ $item->created_at->format('d-m-Y') }}
                                        </small>

                                        <!-- Tombol Aksi -->
                                        <div class="action-buttons">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('umkm.edit', $item) }}" class="btn btn-sm btn-warning rounded-pill me-1" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('umkm.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger rounded-pill" data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Modal untuk gambar -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img id="modalImage" src="" alt="Preview" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






















































        @endsection
