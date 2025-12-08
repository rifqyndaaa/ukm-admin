@extends('layout.app')

@section('content')
<div class="container-fluid mt-3 px-3">
    <!-- Alert Messages -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-3" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-3" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Main Card -->
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
        <!-- Card Header -->
        <div class="card-header bg-gradient-primary text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-20 p-2 rounded-3">
                        <i class="fas fa-store fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">Data UMKM</h5>
                        <p class="mb-0 opacity-75 small">Daftar Usaha Mikro, Kecil, dan Menengah</p>
                    </div>
                </div>
                <div class="badge bg-white text-primary px-3 py-1 rounded-pill fw-medium">
                    <i class="fas fa-chart-bar me-1"></i> {{ $dataUmkm->total() }} Data
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-3">
            <!-- Action Header -->
            <div class="row align-items-center mb-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2">
                        <h6 class="mb-0 fw-bold text-dark">Daftar UMKM</h6>
                        <span class="badge bg-light text-dark border">{{ $dataUmkm->count() }} ditampilkan</span>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-outline-info btn-sm rounded-2 px-3 d-flex align-items-center gap-1" id="toggleView">
                            <i class="fas fa-th-large"></i>
                            <span>Toggle View</span>
                        </button>
                        <a href="{{ route('Umkm.create') }}" class="btn btn-primary btn-sm rounded-2 px-3 d-flex align-items-center gap-1">
                            <i class="fas fa-plus-circle"></i>
                            <span>Tambah UMKM</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="card border mb-3 rounded-3">
                <div class="card-body p-3">
                    <form method="GET" action="{{ route('Umkm.index') }}">
                        <div class="row g-2 align-items-end">
                            <!-- Search Input -->
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <label class="form-label small text-muted mb-1">Cari UMKM</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                           class="form-control border-start-0" placeholder="Nama usaha, alamat...">
                                </div>
                            </div>

                            <!-- RT Input -->
                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <label class="form-label small text-muted mb-1">RT</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white border-end-0">RT</span>
                                    <input type="number" name="rt" value="{{ request('rt') }}"
                                           class="form-control border-start-0" placeholder="RT" min="1">
                                </div>
                            </div>

                            <!-- RW Input -->
                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <label class="form-label small text-muted mb-1">RW</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white border-end-0">RW</span>
                                    <input type="number" name="rw" value="{{ request('rw') }}"
                                           class="form-control border-start-0" placeholder="RW" min="1">
                                </div>
                            </div>

                            <!-- Category Select -->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label class="form-label small text-muted mb-1">Kategori</label>
                                <select name="kategori" class="form-select form-select-sm">
                                    <option value="">Semua Kategori</option>
                                    <option value="Makanan & Minuman" {{ request('kategori') == 'Makanan & Minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                                    <option value="Kerajinan Tangan" {{ request('kategori') == 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                    <option value="Fashion" {{ request('kategori') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                    <option value="Jasa" {{ request('kategori') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                    <option value="Pertanian" {{ request('kategori') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                    <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-xl-2 col-lg-6 col-md-12">
                                <div class="d-flex gap-2 mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center gap-1">
                                        <i class="fas fa-filter"></i>
                                        <span>Filter</span>
                                    </button>
                                    @if(request()->has('search') || request()->has('rt') || request()->has('rw') || request()->has('kategori'))
                                    <a href="{{ route('Umkm.index') }}" class="btn btn-outline-secondary btn-sm px-3 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-redo"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table View (Hidden by Default) -->
            <div class="d-none" id="tableView">
                <div class="card border rounded-3 mb-3">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 ps-3" width="25%">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-store text-primary"></i>
                                                <span>Nama UMKM</span>
                                            </div>
                                        </th>
                                        <th class="border-0" width="15%">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-user text-primary"></i>
                                                <span>Pemilik</span>
                                            </div>
                                        </th>
                                        <th class="border-0" width="25%">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <span>Alamat</span>
                                            </div>
                                        </th>
                                        <th class="border-0" width="10%">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-phone text-primary"></i>
                                                <span>Kontak</span>
                                            </div>
                                        </th>
                                        <th class="border-0" width="15%">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-tag text-primary"></i>
                                                <span>Kategori</span>
                                            </div>
                                        </th>
                                        <th class="border-0 text-end pe-3" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataUmkm as $item)
                                    <tr>
                                        <td class="ps-3">
                                            <div class="d-flex align-items-center gap-2">
                                                @php
                                                    $media = \App\Models\Media::where('ref_table', 'umkm')
                                                                ->where('ref_id', $item->umkm_id)
                                                                ->where('caption', 'foto_usaha')
                                                                ->first();
                                                @endphp
                                                <div class="position-relative">
                                                    @if ($media)
                                                    <img src="{{ asset('storage/'.$media->file_url) }}"
                                                         class="rounded-2"
                                                         style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                    <div class="rounded-2 bg-light d-flex align-items-center justify-content-center"
                                                         style="width: 40px; height: 40px;">
                                                        <i class="fas fa-store text-muted"></i>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-dark">{{ $item->nama_usaha }}</div>
                                                    <div class="text-muted small text-truncate" style="max-width: 200px;">
                                                        {{ Str::limit($item->deskripsi, 30) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-medium">{{ $item->nama_pemilik }}</div>
                                            <div class="text-muted small">ID: {{ $item->pemilik_warga_id }}</div>
                                        </td>
                                        <td>
                                            <div class="text-dark">{{ Str::limit($item->alamat, 30) }}</div>
                                            <div class="d-flex gap-1 mt-1">
                                                <span class="badge bg-primary bg-opacity-10 text-primary border-0 px-2 py-1 rounded-1 small">
                                                    RT {{ $item->rt }}
                                                </span>
                                                <span class="badge bg-primary bg-opacity-10 text-primary border-0 px-2 py-1 rounded-1 small">
                                                    RW {{ $item->rw }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-dark">{{ $item->telepon }}</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info bg-opacity-10 text-info border-0 px-3 py-1 rounded-1">
                                                {{ $item->kategori ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="pe-3 text-end">
                                            <div class="d-flex gap-1 justify-content-end">
                                                <button class="btn btn-sm btn-outline-info rounded-2 px-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $item->umkm_id }}"
                                                        title="Detail">
                                                    <i class="fas fa-eye fa-xs"></i>
                                                </button>
                                                <a href="{{ route('Umkm.edit', $item->umkm_id )}}"
                                                   class="btn btn-sm btn-outline-warning rounded-2 px-2"
                                                   title="Edit">
                                                    <i class="fas fa-edit fa-xs"></i>
                                                </a>
                                                <form action="{{ route('Umkm.destroy', $item->umkm_id) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-2 px-2"
                                                            title="Hapus">
                                                        <i class="fas fa-trash-alt fa-xs"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card View -->
            @if($dataUmkm->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3" id="cardView">
                @foreach ($dataUmkm as $item)
                @php
                    $media = \App\Models\Media::where('ref_table', 'umkm')
                                ->where('ref_id', $item->umkm_id)
                                ->where('caption', 'foto_usaha')
                                ->first();
                @endphp

                <div class="col">
                    <div class="card h-100 border rounded-3 overflow-hidden shadow-sm hover-lift">
                        <!-- Card Image -->
                        <div class="position-relative">
                            @if ($media)
                            <img src="{{ asset('storage/'.$media->file_url) }}"
                                 class="card-img-top"
                                 style="height: 160px; object-fit: cover;">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                 style="height: 160px;">
                                <i class="fas fa-store fa-3x text-muted opacity-50"></i>
                            </div>
                            @endif

                            <!-- Location Badge -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-primary bg-opacity-90 text-white px-2 py-1 rounded-1 small fw-medium">
                                    <i class="fas fa-map-marker-alt me-1"></i>RT {{ $item->rt }}/RW {{ $item->rw }}
                                </span>
                            </div>

                            <!-- Category Badge -->
                            @if($item->kategori)
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-info bg-opacity-90 text-white px-2 py-1 rounded-1 small fw-medium">
                                    <i class="fas fa-tag me-1"></i>{{ Str::limit($item->kategori, 12) }}
                                </span>
                            </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column p-3">
                            <h6 class="card-title fw-bold mb-2 text-dark">{{ $item->nama_usaha }}</h6>

                            <!-- Owner Info -->
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fas fa-user text-primary fa-sm"></i>
                                <span class="text-muted small">{{ $item->nama_pemilik }}</span>
                            </div>

                            <!-- Address Info -->
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fas fa-map-marker-alt text-primary fa-sm"></i>
                                <span class="text-muted small text-truncate">{{ Str::limit($item->alamat, 35) }}</span>
                            </div>

                            <!-- Phone Info -->
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <i class="fas fa-phone text-primary fa-sm"></i>
                                <span class="text-muted small">{{ $item->telepon }}</span>
                            </div>

                            <!-- Description -->
                            <p class="text-secondary mb-3 small line-clamp-2" style="min-height: 40px;">
                                {{ Str::limit($item->deskripsi, 70) }}
                            </p>

                            <!-- Footer Actions -->
                            <div class="mt-auto pt-2 border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-muted small d-flex align-items-center gap-1">
                                        <i class="far fa-calendar"></i>
                                        <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                    </div>

                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-info rounded-2 px-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->umkm_id }}"
                                                title="Detail">
                                            <i class="fas fa-eye fa-xs"></i>
                                        </button>
                                        <a href="{{ route('Umkm.edit', $item->umkm_id) }}"
                                           class="btn btn-sm btn-outline-warning rounded-2 px-2"
                                           title="Edit">
                                            <i class="fas fa-edit fa-xs"></i>
                                        </a>
                                        <form action="{{ route('Umkm.destroy', $item->umkm_id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-2 px-2"
                                                    title="Hapus">
                                                <i class="fas fa-trash-alt fa-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-5 my-4">
                <div class="mb-4">
                    <i class="fas fa-store fa-4x text-muted opacity-25"></i>
                </div>
                <h5 class="text-muted mb-2">Belum ada data UMKM</h5>
                <p class="text-muted small mb-4">Mulai dengan menambahkan data UMKM pertama Anda</p>
                <a href="{{ route('Umkm.create') }}" class="btn btn-primary rounded-2 px-4 d-flex align-items-center gap-2 mx-auto" style="width: fit-content;">
                    <i class="fas fa-plus"></i>
                    <span>Tambah UMKM Pertama</span>
                </a>
            </div>
            @endif

            <!-- Pagination -->
            @if($dataUmkm->hasPages())
            <div class="mt-4 pt-3 border-top">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                    <div class="text-muted small">
                        Menampilkan <span class="fw-medium">{{ $dataUmkm->firstItem() }} - {{ $dataUmkm->lastItem() }}</span>
                        dari <span class="fw-medium">{{ $dataUmkm->total() }}</span> data
                    </div>
                    <div>
                        {{ $dataUmkm->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- ============= MODAL DETAIL ============= -->
@foreach ($dataUmkm as $item)
<div class="modal fade" id="detailModal{{ $item->umkm_id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-3 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white rounded-top-3 py-3">
                <h5 class="modal-title mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle"></i>
                    <span>Detail UMKM</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                @php
                    $mediaDetail = \App\Models\Media::where('ref_table', 'umkm')
                        ->where('ref_id', $item->umkm_id)
                        ->where('caption', 'foto_usaha')
                        ->first();
                    $mediaLainnya = \App\Models\Media::where('ref_table', 'umkm')
                        ->where('ref_id', $item->umkm_id)
                        ->where('caption', '!=', 'foto_usaha')
                        ->get();
                @endphp

                <div class="row g-4">
                    <!-- Left Column: Image -->
                    <div class="col-md-4">
                        <div class="text-center">
                            @if ($mediaDetail)
                            <img src="{{ asset('storage/'.$mediaDetail->file_url) }}"
                                 class="img-fluid rounded-2 shadow-sm mb-3"
                                 style="height: 200px; object-fit: cover;">
                            @else
                            <div class="bg-light rounded-2 p-4 mb-3 d-flex align-items-center justify-content-center"
                                 style="height: 200px;">
                                <i class="fas fa-store fa-4x text-muted opacity-50"></i>
                            </div>
                            @endif

                            @if($mediaLainnya->count() > 0)
                            <div class="mt-3">
                                <h6 class="text-muted mb-2 small fw-bold d-flex align-items-center gap-2">
                                    <i class="fas fa-images"></i>
                                    <span>Media Lainnya</span>
                                </h6>
                                <div class="d-flex flex-wrap gap-1 justify-content-center">
                                    @foreach($mediaLainnya as $media)
                                    <a href="{{ asset('storage/'.$media->file_url) }}" target="_blank"
                                       class="btn btn-sm btn-outline-primary rounded-2 px-2 py-1 d-flex align-items-center gap-1">
                                        <i class="fas fa-file fa-xs"></i>
                                        <span>File {{ $loop->iteration }}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Column: Details -->
                    <div class="col-md-8">
                        <h5 class="fw-bold text-primary mb-3">{{ $item->nama_usaha }}</h5>

                        <div class="row g-3">
                            <!-- Owner -->
                            <div class="col-md-6">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-user"></i>
                                        <span>Nama Pemilik</span>
                                    </small>
                                    <p class="mb-0 fw-semibold">{{ $item->nama_pemilik }}</p>
                                    <small class="text-muted">ID: {{ $item->pemilik_warga_id }}</small>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="col-md-6">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-phone"></i>
                                        <span>Kontak</span>
                                    </small>
                                    <p class="mb-0 fw-semibold">{{ $item->telepon }}</p>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Alamat Lengkap</span>
                                    </small>
                                    <p class="mb-2">{{ $item->alamat }}</p>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-primary bg-opacity-10 text-primary border-0 px-3 py-1 rounded-1">
                                            RT {{ $item->rt }}
                                        </span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary border-0 px-3 py-1 rounded-1">
                                            RW {{ $item->rw }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-tag"></i>
                                        <span>Kategori</span>
                                    </small>
                                    <p class="mb-0 fw-semibold">{{ $item->kategori ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Created Date -->
                            <div class="col-md-6">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-calendar"></i>
                                        <span>Tanggal Input</span>
                                    </small>
                                    <p class="mb-0">{{ $item->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="border rounded-2 p-3 bg-light">
                                    <small class="text-muted mb-2 d-flex align-items-center gap-1">
                                        <i class="fas fa-align-left"></i>
                                        <span>Deskripsi Usaha</span>
                                    </small>
                                    <p class="mb-0">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer py-3">
                <div class="d-flex justify-content-between w-100">
                    <a href="{{ route('Umkm.edit', $item->umkm_id) }}"
                       class="btn btn-warning rounded-2 px-4 d-flex align-items-center gap-2">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </a>
                    <button class="btn btn-secondary rounded-2 px-4 d-flex align-items-center gap-2" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ============= END MODAL DETAIL ============= -->

@push('styles')
<style>
    .container-fluid {
        max-width: 100%;
    }

    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card {
        border: 1px solid #e9ecef;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
    }

    .badge {
        font-weight: 500;
        font-size: 0.75rem;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    .table th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        font-weight: 600;
        color: #495057;
    }

    .table td {
        vertical-align: middle;
        padding: 0.75rem;
    }

    .form-control, .form-select {
        border-radius: 0.375rem;
    }

    .input-group-text {
        background-color: #fff;
        border-color: #dee2e6;
    }

    .rounded-2 {
        border-radius: 0.5rem !important;
    }

    .rounded-3 {
        border-radius: 0.75rem !important;
    }

    .text-truncate {
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-img-top {
            height: 140px !important;
        }

        .modal-body .row {
            flex-direction: column;
        }

        .modal-body .col-md-4,
        .modal-body .col-md-8 {
            width: 100%;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle View (Card/Table)
        const toggleViewBtn = document.getElementById('toggleView');
        const cardView = document.getElementById('cardView');
        const tableView = document.getElementById('tableView');
        let isCardView = true;

        toggleViewBtn.addEventListener('click', function() {
            if (isCardView) {
                cardView.classList.add('d-none');
                tableView.classList.remove('d-none');
                toggleViewBtn.innerHTML = '<i class="fas fa-th-large"></i><span>Card View</span>';
                toggleViewBtn.classList.replace('btn-outline-info', 'btn-info');
                isCardView = false;
            } else {
                tableView.classList.add('d-none');
                cardView.classList.remove('d-none');
                toggleViewBtn.innerHTML = '<i class="fas fa-th-list"></i><span>Table View</span>';
                toggleViewBtn.classList.replace('btn-info', 'btn-outline-info');
                isCardView = true;
            }
        });

        // Filter validation
        const rtInput = document.querySelector('input[name="rt"]');
        const rwInput = document.querySelector('input[name="rw"]');

        if (rtInput) {
            rtInput.addEventListener('input', function() {
                if (this.value < 1) this.value = 1;
            });
        }

        if (rwInput) {
            rwInput.addEventListener('input', function() {
                if (this.value < 1) this.value = 1;
            });
        }

        // Tooltip initialization
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Equal card heights for XL screens
        function equalizeCardHeights() {
            if (window.innerWidth >= 1200) {
                const cards = document.querySelectorAll('#cardView .card');
                let maxHeight = 0;

                cards.forEach(card => {
                    card.style.height = 'auto';
                    const height = card.offsetHeight;
                    if (height > maxHeight) {
                        maxHeight = height;
                    }
                });

                cards.forEach(card => {
                    card.style.height = maxHeight + 'px';
                });
            } else {
                const cards = document.querySelectorAll('#cardView .card');
                cards.forEach(card => {
                    card.style.height = 'auto';
                });
            }
        }

        // Run on load and resize
        window.addEventListener('load', equalizeCardHeights);
        window.addEventListener('resize', equalizeCardHeights);
    });
</script>
@endpush

@endsection
