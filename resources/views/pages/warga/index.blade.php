@extends('layout.app')
@section('content')
<div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header text-white text-center py-3">
                <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data Warga</h2>
            </div>
            <div class="card-body">
                <!-- Tambah Warga Button -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0"></h3>
                    <a href="{{ route('Warga.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Warga
                    </a>
                </div>

                <!-- Alert Success -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Search and Filter -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="search-container">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Cari warga berdasarkan nama, KTP, atau email...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="filter-container">
                            <select class="form-select">
                                <option value="">Semua Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Card View -->
                <div class="row" id="warga-cards">
                    @foreach($warga as $w)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-warga shadow-sm border-0 h-100">
                            <div class="card-body d-flex flex-column">
                                <!-- Header dengan nama dan KTP -->
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0">{{ $w->nama }}</h5>
                                    <span class="badge bg-primary">{{ $w->no_ktp }}</span>
                                </div>

                                <!-- Informasi Warga -->
                                <div class="mb-3">
                                    <div class="d-flex">
                                        <span class="info-label me-2">Jenis Kelamin:</span>
                                        <span class="info-value">{{ $w->jenis_kelamin }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <span class="info-label me-2">Agama:</span>
                                        <span class="info-value">{{ $w->agama }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <span class="info-label me-2">Pekerjaan:</span>
                                        <span class="info-value">{{ $w->pekerjaan }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <span class="info-label me-2">Telp:</span>
                                        <span class="info-value">{{ $w->telp }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <span class="info-label me-2">Email:</span>
                                        <span class="info-value">{{ $w->email }}</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="action-buttons mt-auto">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('Warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm me-md-2">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('Warga.destroy', $w->warga_id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination (jika diperlukan) -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="imageModalLabel"><i class="fas fa-image me-2"></i>Preview Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Preview" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>
@endsection
