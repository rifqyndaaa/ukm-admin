@extends('layout.app')

@section('content')
<div class="container-fluid px-lg-4 px-3 py-4">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
        <div class="mb-3 mb-md-0">
            <h2 class="fw-bold mb-2 text-primary">📝 Ulasan Produk</h2>
            <p class="text-muted mb-0">Kelola dan pantau ulasan pelanggan untuk produk UMKM Anda</p>
        </div>
        <a href="{{ route('ulasan-produk.create') }}" class="btn btn-primary px-4 py-2 shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Tambah Ulasan Baru
        </a>
    </div>

    <!-- Alert Notification -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle me-3 fs-5"></i>
        <div class="flex-grow-1">{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Filter Section -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h5 class="card-title mb-3 fw-semibold"><i class="fas fa-filter me-2 text-primary"></i>Filter & Pencarian</h5>
            <form method="GET" class="row g-3">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <label class="form-label fw-medium">Produk</label>
                    <select name="produk_id" class="form-select border-primary-subtle" onchange="this.form.submit()">
                        <option value="">Semua Produk</option>
                        @foreach($produk as $p)
                            <option value="{{ $p->produk_id }}" {{ request('produk_id') == $p->produk_id ? 'selected' : '' }}>
                                {{ $p->nama_produk }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <label class="form-label fw-medium">Cari Ulasan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-primary-subtle">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-start-0 border-primary-subtle"
                               placeholder="Komentar, nama pelanggan..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-search me-2"></i>Terapkan
                    </button>
                    <a href="{{ route('ulasan-produk.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-redo me-2"></i>Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Cards -->
    @if($ulasan->isNotEmpty())
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-primary text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2 opacity-75">Total Ulasan</h6>
                            <h3 class="fw-bold mb-0">{{ $ulasan->total() }}</h3>
                        </div>
                        <i class="fas fa-comments fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        @php
            $avgRating = $ulasan->avg('rating') ?? 0;
        @endphp
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-success text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2 opacity-75">Rata-rata Rating</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($avgRating, 1) }}/5</h3>
                        </div>
                        <i class="fas fa-star fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-info text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2 opacity-75">Produk Terulas</h6>
                            <h3 class="fw-bold mb-0">{{ $produk->count() }}</h3>
                        </div>
                        <i class="fas fa-box fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-warning text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-subtitle mb-2 opacity-75">Halaman</h6>
                            <h3 class="fw-bold mb-0">{{ $ulasan->currentPage() }}/{{ $ulasan->lastPage() }}</h3>
                        </div>
                        <i class="fas fa-file-alt fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Reviews Grid -->
    <div class="row" id="reviews-container">
        @forelse($ulasan as $item)
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 mb-4">
            <div class="card review-card border-0 shadow-sm h-100 hover-lift">
                <!-- Card Header with Rating Stars -->
                <div class="card-header bg-white border-bottom-0 pt-4 pb-3 px-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="fw-bold text-truncate mb-1">{{ $item->produk->nama_produk }}</h6>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-user me-1"></i>{{ $item->warga->nama ?? 'Anonim' }}
                            </p>
                        </div>
                        <div class="rating-badge">
                            <span class="badge bg-warning text-dark fw-bold px-3 py-2">
                                <i class="fas fa-star me-1"></i>{{ $item->rating }}/5
                            </span>
                        </div>
                    </div>
                    <!-- Star Rating Visual -->
                    <div class="star-rating mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $item->rating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star text-muted"></i>
                            @endif
                        @endfor
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body pt-0 px-4 pb-3">
                    <div class="review-comment">
                        <p class="mb-0">
                            {{ Str::limit($item->komentar, 120, '...') ?? 'Tidak ada komentar' }}
                        </p>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i>
                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}
                        </small>
                    </div>
                </div>

                <!-- Card Footer with Actions -->
                <div class="card-footer bg-white border-top-0 pb-4 px-4 pt-0">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-info btn-sm flex-fill"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->ulasan_id }}">
                            <i class="fas fa-eye me-1"></i>Detail
                        </button>

                        <a href="{{ route('ulasan-produk.edit', $item->ulasan_id) }}"
                           class="btn btn-outline-warning btn-sm flex-fill">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>

                        <form action="{{ route('ulasan-produk.destroy', $item->ulasan_id) }}"
                              method="POST" class="flex-fill delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="btn btn-outline-danger btn-sm w-100 delete-btn"
                                    data-id="{{ $item->ulasan_id }}">
                                <i class="fas fa-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body py-5 text-center">
                    <div class="empty-state-icon mb-4">
                        <i class="far fa-comments fa-4x text-muted opacity-25"></i>
                    </div>
                    <h4 class="text-muted mb-3">Belum Ada Ulasan</h4>
                    <p class="text-muted mb-4">Mulai dengan menambahkan ulasan pertama untuk produk Anda.</p>
                    <a href="{{ route('ulasan-produk.create') }}" class="btn btn-primary px-4">
                        <i class="fas fa-plus me-2"></i>Tambah Ulasan Pertama
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($ulasan->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-5 pt-3 border-top">
        <div class="text-muted small">
            Menampilkan {{ $ulasan->firstItem() ?? 0 }}-{{ $ulasan->lastItem() ?? 0 }} dari {{ $ulasan->total() }} ulasan
        </div>
        <nav aria-label="Page navigation">
            {{ $ulasan->withQueryString()->links('pagination::bootstrap-5') }}
        </nav>
    </div>
    @endif
</div>

<!-- Detail Modals -->
@foreach($ulasan as $item)
<div class="modal fade" id="detailModal{{ $item->ulasan_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-file-alt me-2"></i>Detail Ulasan Lengkap
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Column - Info -->
                    <div class="col-lg-8 p-4">
                        <div class="mb-4">
                            <h6 class="text-primary mb-2">Produk</h6>
                            <div class="d-flex align-items-center bg-light p-3 rounded">
                                <i class="fas fa-box text-primary me-3 fa-lg"></i>
                                <div>
                                    <h5 class="mb-1 fw-bold">{{ $item->produk->nama_produk }}</h5>
                                    <p class="text-muted mb-0 small">ID: {{ $item->produk->produk_id }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary mb-2">Pelanggan</h6>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle text-primary me-2"></i>
                                    <span class="fw-medium">{{ $item->warga->nama ?? 'Tidak Diketahui' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary mb-2">Rating</h6>
                                <div class="d-flex align-items-center">
                                    <div class="star-rating-large me-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $item->rating)
                                                <i class="fas fa-star text-warning fa-lg"></i>
                                            @else
                                                <i class="far fa-star text-muted fa-lg"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="badge bg-warning text-dark fs-6">{{ $item->rating }}/5</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-primary mb-2">Komentar Lengkap</h6>
                            <div class="bg-light p-3 rounded min-h-100">
                                <p class="mb-0">{{ $item->komentar ?? 'Tidak ada komentar' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Metadata -->
                    <div class="col-lg-4 bg-light p-4 rounded-end">
                        <h6 class="text-primary mb-3">Informasi Sistem</h6>

                        <div class="mb-3">
                            <p class="text-muted small mb-1">Dibuat Pada</p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-plus text-success me-2"></i>
                                <span class="fw-medium">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="text-muted small mb-1">Diperbarui Pada</p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-check text-info me-2"></i>
                                <span class="fw-medium">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="text-muted small mb-1">ID Ulasan</p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-fingerprint text-secondary me-2"></i>
                                <code class="bg-white px-2 py-1 rounded">{{ $item->ulasan_id }}</code>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <a href="{{ route('ulasan-produk.edit', $item->ulasan_id) }}"
                               class="btn btn-warning w-100 mb-2">
                                <i class="fas fa-edit me-2"></i>Edit Ulasan
                            </a>
                            <button class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Penghapusan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-trash-alt fa-4x text-danger mb-4 opacity-50"></i>
                <h5 class="fw-bold mb-3">Hapus Ulasan Ini?</h5>
                <p class="text-muted">Ulasan yang dihapus tidak dapat dikembalikan. Yakin ingin melanjutkan?</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-danger px-4">
                        <i class="fas fa-trash me-2"></i>Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom Styles */
    .review-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }

    .star-rating {
        font-size: 14px;
    }

    .star-rating-large {
        font-size: 20px;
    }

    .rating-badge .badge {
        border-radius: 20px;
    }

    .hover-lift:hover {
        transform: translateY(-4px);
    }

    .min-h-100 {
        min-height: 100px;
    }

    .empty-state-icon {
        opacity: 0.5;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #36b9cc 0%, #258391 100%);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .review-comment p {
            font-size: 14px;
        }

        .card-footer .btn {
            font-size: 12px;
            padding: 0.25rem 0.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete confirmation with modal
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const reviewId = this.getAttribute('data-id');

                // Set form action
                deleteForm.action = `{{ url('ulasan-produk') }}/${reviewId}`;

                // Show modal
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });

        // Auto-dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Add loading state to filter buttons
        const filterForm = document.querySelector('form[method="GET"]');
        const filterBtn = filterForm.querySelector('button[type="submit"]');

        filterForm.addEventListener('submit', function() {
            filterBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            filterBtn.disabled = true;
        });
    });
</script>
@endpush
