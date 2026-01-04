@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="card border-0 shadow-sm bg-gradient-primary bg-opacity-10">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold text-primary mb-1">Detail Pesanan</h2>
                            <p class="text-muted mb-0">Kelola detail item pesanan dengan tampilan yang lebih baik</p>
                        </div>
                        <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary shadow-sm px-4">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <form method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted mb-1">
                                <i class="fas fa-shopping-cart me-1"></i>Pesanan
                            </label>
                            <select name="pesanan_id" class="form-select form-select-sm border-start-3 border-start-primary">
                                <option value="">Semua Pesanan</option>
                                @foreach($pesanan as $p)
                                    <option value="{{ $p->pesanan_id }}" {{ request('pesanan_id') == $p->pesanan_id ? 'selected' : '' }}>
                                        #{{ $p->pesanan_id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted mb-1">
                                <i class="fas fa-box me-1"></i>Produk
                            </label>
                            <select name="produk_id" class="form-select form-select-sm border-start-3 border-start-success">
                                <option value="">Semua Produk</option>
                                @foreach($produk as $p)
                                    <option value="{{ $p->produk_id }}" {{ request('produk_id') == $p->produk_id ? 'selected' : '' }}>
                                        {{ $p->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted mb-1">
                                <i class="fas fa-search me-1"></i>Cari
                            </label>
                            <input type="text" name="search" class="form-control form-control-sm border-start-3 border-start-info"
                                   placeholder="Nama produk..." value="{{ request('search') }}">
                        </div>

                        <div class="col-md-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-sm flex-fill">
                                <i class="fas fa-filter me-1"></i>Terapkan Filter
                            </button>
                            <a href="{{ route('detail-pesanan.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-redo me-1"></i>Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 hover-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-3 me-3">
                            <i class="fas fa-layer-group text-primary fa-lg p-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-1">Total Items</p>
                            <h3 class="mb-0 fw-bold text-dark">{{ $detailPesanan->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 hover-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-3 me-3">
                            <i class="fas fa-cubes text-success fa-lg p-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-1">Total Qty</p>
                            <h3 class="mb-0 fw-bold text-dark">{{ $detailPesanan->sum('qty') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 hover-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper bg-info bg-opacity-10 rounded-3 me-3">
                            <i class="fas fa-money-bill-wave text-info fa-lg p-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-1">Total Subtotal</p>
                            <h3 class="mb-0 fw-bold text-dark">Rp {{ number_format($detailPesanan->sum('subtotal')) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 hover-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper bg-warning bg-opacity-10 rounded-3 me-3">
                            <i class="fas fa-chart-line text-warning fa-lg p-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-1">Rata-rata Harga</p>
                            <h3 class="mb-0 fw-bold text-dark">
                                Rp {{ $detailPesanan->count() > 0 ? number_format($detailPesanan->avg('harga_satuan')) : 0 }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content - Grid Cards -->
    @if($detailPesanan->count() > 0)
    <div class="row g-4">
        @foreach($detailPesanan as $item)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-lift">
                <div class="card-header bg-white border-bottom pb-3 pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="badge-wrapper bg-primary bg-opacity-10 rounded-2 me-2">
                                <i class="fas fa-hashtag text-primary p-2"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-dark">Pesanan #{{ $item->pesanan->pesanan_id }}</span>
                                <p class="text-muted small mb-0">Item Detail</p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-link text-muted p-0 border-0" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 py-2">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                       href="{{ route('detail-pesanan.edit', $item->detail_id) }}">
                                        <i class="fas fa-edit text-warning me-2"></i>
                                        <span>Edit</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                       href="javascript:void(0)"
                                       data-bs-toggle="modal"
                                       data-bs-target="#detailModal{{ $item->detail_id }}">
                                        <i class="fas fa-eye text-info me-2"></i>
                                        <span>Detail Lengkap</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li>
                                    <form action="{{ route('detail-pesanan.destroy', $item->detail_id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dropdown-item d-flex align-items-center text-danger delete-btn">
                                            <i class="fas fa-trash-alt me-2"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">
                    <!-- Product Info -->
                    <div class="product-card mb-4">
                        <div class="d-flex align-items-center">
                            <div class="product-icon bg-gradient-primary bg-opacity-10 text-primary rounded-3 me-3">
                                <i class="fas fa-box fa-lg p-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-semibold text-dark mb-1">{{ $item->produk->nama_produk }}</h5>
                                <p class="text-muted small mb-0">
                                    <i class="fas fa-tag me-1"></i>ID: {{ $item->produk_id }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="details-grid mb-4">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="detail-item">
                                    <div class="detail-icon bg-info bg-opacity-10 rounded-2">
                                        <i class="fas fa-cube text-info"></i>
                                    </div>
                                    <div class="detail-content">
                                        <p class="text-muted small mb-0">Quantity</p>
                                        <p class="mb-0 fw-bold fs-5">{{ $item->qty }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="detail-item">
                                    <div class="detail-icon bg-success bg-opacity-10 rounded-2">
                                        <i class="fas fa-tag text-success"></i>
                                    </div>
                                    <div class="detail-content">
                                        <p class="text-muted small mb-0">Harga Satuan</p>
                                        <p class="mb-0 fw-bold fs-5">Rp {{ number_format($item->harga_satuan) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subtotal Card -->
                    <div class="subtotal-card bg-gradient-light bg-opacity-25 rounded-3 p-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted small mb-0">Subtotal Item</p>
                                <p class="mb-0 fw-bold text-dark">Pesanan #{{ $item->pesanan->pesanan_id }}</p>
                            </div>
                            <div class="subtotal-value">
                                <span class="fw-bold fs-4 text-success">Rp {{ number_format($item->subtotal) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timestamp -->
                    <div class="timestamp text-end">
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i>
                            Dibuat: {{ $item->created_at->format('d M Y, H:i') }}
                        </small>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="card-footer bg-white border-top-0 pt-0 pb-4">
                    <div class="d-flex gap-2">
                        <a href="{{ route('detail-pesanan.edit', $item->detail_id )}}"
                           class="btn btn-outline-warning btn-sm flex-fill d-flex align-items-center justify-content-center">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <button class="btn btn-outline-info btn-sm flex-fill d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->detail_id }}">
                            <i class="fas fa-eye me-2"></i>Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="row mt-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $detailPesanan->firstItem() }} - {{ $detailPesanan->lastItem() }}
                                dari {{ $detailPesanan->total() }} item
                            </p>
                        </div>
                        <nav aria-label="Page navigation">
                            {{ $detailPesanan->withQueryString()->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Empty State -->
    <div class="row">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <div class="empty-state-icon mb-4">
                        <i class="fas fa-shopping-basket fa-4x text-muted opacity-25"></i>
                    </div>
                    <h4 class="text-muted mb-3">Belum ada detail pesanan</h4>
                    <p class="text-muted mb-4">
                        Mulai dengan menambahkan detail pesanan baru untuk melacak item-item dalam pesanan.
                    </p>
                    <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary px-4">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Detail Pesanan Pertama
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Modals Detail -->
@foreach($detailPesanan as $item)
<div class="modal fade" id="detailModal{{ $item->detail_id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->detail_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient-primary text-white">
                <div class="d-flex align-items-center">
                    <div class="modal-icon bg-white bg-opacity-25 rounded-circle me-3">
                        <i class="fas fa-info-circle fa-lg p-2"></i>
                    </div>
                    <div>
                        <h5 class="modal-title mb-0" id="detailModalLabel{{ $item->detail_id }}">
                            Detail Lengkap Pesanan
                        </h5>
                        <p class="text-white text-opacity-75 small mb-0">#{{ $item->pesanan->pesanan_id }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <!-- Product Info -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="product-icon-large bg-primary bg-opacity-10 text-primary rounded-3 me-3">
                                        <i class="fas fa-box fa-2x p-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">{{ $item->produk->nama_produk }}</h5>
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-tag me-1"></i>Produk ID: {{ $item->produk_id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 bg-success bg-opacity-10">
                            <div class="card-body text-center">
                                <p class="text-muted small mb-1">Subtotal</p>
                                <h3 class="fw-bold text-success mb-0">Rp {{ number_format($item->subtotal) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="card border-0 h-100">
                            <div class="card-header bg-white border-bottom-0 pb-2">
                                <h6 class="fw-semibold text-primary mb-0">
                                    <i class="fas fa-shopping-cart me-2"></i>Informasi Pesanan
                                </h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <td width="40%" class="text-muted">Pesanan ID</td>
                                        <td class="fw-semibold">#{{ $item->pesanan->pesanan_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Dibuat</td>
                                        <td class="fw-semibold">{{ $item->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Diperbarui</td>
                                        <td class="fw-semibold">{{ $item->updated_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 h-100">
                            <div class="card-header bg-white border-bottom-0 pb-2">
                                <h6 class="fw-semibold text-success mb-0">
                                    <i class="fas fa-box me-2"></i>Informasi Produk
                                </h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <td width="40%" class="text-muted">Produk</td>
                                        <td class="fw-semibold">{{ $item->produk->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Quantity</td>
                                        <td class="fw-semibold">{{ $item->qty }} unit</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Harga Satuan</td>
                                        <td class="fw-semibold text-primary">Rp {{ number_format($item->harga_satuan) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="card border-0 bg-gradient-light">
                    <div class="card-header bg-white border-bottom-0">
                        <h6 class="fw-semibold text-info mb-0">
                            <i class="fas fa-calculator me-2"></i>Perhitungan Harga
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <div class="price-item p-3 rounded-3 bg-white">
                                    <p class="text-muted small mb-1">Harga Satuan</p>
                                    <h4 class="fw-bold text-primary">Rp {{ number_format($item->harga_satuan) }}</h4>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="price-item p-3 rounded-3 bg-white">
                                    <p class="text-muted small mb-1">Quantity</p>
                                    <h4 class="fw-bold text-info">{{ $item->qty }} unit</h4>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="price-item p-3 rounded-3 bg-white">
                                    <p class="text-muted small mb-1">Subtotal</p>
                                    <h4 class="fw-bold text-success">Rp {{ number_format($item->subtotal) }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <small class="text-muted">
                                {{ $item->qty }} × Rp {{ number_format($item->harga_satuan) }} = Rp {{ number_format($item->subtotal) }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
                <a href="{{ route('detail-pesanan.edit', $item->detail_id) }}" class="btn btn-primary px-4">
                    <i class="fas fa-edit me-2"></i>Edit Data
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('styles')
<style>
    /* Custom Styles */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .bg-gradient-light {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
    }

    .card {
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.08);
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07) !important;
    }

    .hover-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-icon-large {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .badge-wrapper {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-item {
        display: flex;
        align-items: center;
        padding: 12px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 8px;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .detail-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
    }

    .detail-content {
        flex: 1;
    }

    .subtotal-card {
        border-left: 4px solid #28a745 !important;
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.05) 0%, rgba(40, 167, 69, 0.02) 100%);
    }

    .modal-header {
        border-bottom: none;
        padding: 1.5rem 2rem;
    }

    .modal-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .price-item {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .price-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .border-start-3 {
        border-left-width: 3px !important;
    }

    .border-start-primary {
        border-left-color: #667eea !important;
    }

    .border-start-success {
        border-left-color: #28a745 !important;
    }

    .border-start-info {
        border-left-color: #17a2b8 !important;
    }

    .dropdown-menu {
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,0.08);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        border-radius: 5px;
        margin: 0 0.25rem;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(0,0,0,0.05);
    }

    .empty-state-icon {
        opacity: 0.5;
    }

    .timestamp {
        font-size: 0.85rem;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }

    .form-select-sm, .form-control-sm {
        border-radius: 6px;
        border: 1px solid #dee2e6;
    }

    .modal-content {
        border-radius: 16px;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger px-4',
                    cancelButton: 'btn btn-secondary px-4'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Card hover effects
    const cards = document.querySelectorAll('.hover-lift, .hover-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transition = 'all 0.3s ease';
        });
    });

    // Price items animation
    const priceItems = document.querySelectorAll('.price-item');
    priceItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transition = 'all 0.3s ease';
        });
    });
});
</script>
@endpush
@endsection
