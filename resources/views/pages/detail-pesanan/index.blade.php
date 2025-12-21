@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold text-primary mb-1">Data Detail Pesanan</h3>
                    <p class="text-muted mb-0">Kelola detail pesanan produk dengan mudah</p>
                </div>
                <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary px-4">
                    <i class="fas fa-plus me-2"></i>Tambah Detail Pesanan
                </a>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <form method="GET" class="row mb-3">
        <div class="col-md-3 mb-2">
            <select name="pesanan_id" class="form-select">
                <option value="">-- Semua Pesanan --</option>
                @foreach($pesanan as $p)
                    <option value="{{ $p->pesanan_id }}" {{ request('pesanan_id') == $p->pesanan_id ? 'selected' : '' }}>
                        {{ $p->pesanan_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-2">
            <select name="produk_id" class="form-select">
                <option value="">-- Semua Produk --</option>
                @foreach($produk as $p)
                    <option value="{{ $p->produk_id }}" {{ request('produk_id') == $p->produk_id ? 'selected' : '' }}>
                        {{ $p->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-2">
            <input type="text" name="search" class="form-control" placeholder="Cari nama produk" value="{{ request('search') }}">
        </div>

        <div class="col-md-3 d-flex gap-2 mb-2">
            <button type="submit" class="btn btn-secondary">Filter</button>
            <a href="{{ route('detail-pesanan.index') }}" class="btn btn-outline-danger">Reset</a>
        </div>
    </form>

    <!-- Card Container -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Pesanan</th>
                            <th>Produk</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Harga Satuan</th>
                            <th class="text-end">Subtotal</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detailPesanan as $item)
                        <tr class="align-middle">
                            <td>
                                {{ $loop->iteration + ($detailPesanan->currentPage()-1) * $detailPesanan->perPage() }}
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-1 rounded-pill">
                                    {{ $item->pesanan->pesanan_id }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3">
                                        <i class="fas fa-box text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $item->produk->nama_produk }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded">
                                    {{ $item->qty }}
                                </span>
                            </td>
                            <td class="text-end fw-semibold text-primary">
                                Rp {{ number_format($item->harga_satuan) }}
                            </td>
                            <td class="text-end fw-bold text-success">
                                Rp {{ number_format($item->subtotal) }}
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('detail-pesanan.edit', $item->detail_id) }}"
                                       class="btn btn-outline-warning btn-sm d-flex align-items-center gap-1"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                        <span class="d-none d-md-inline">Edit</span>
                                    </a>

                                    <form action="{{ route('detail-pesanan.destroy', $item->detail_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-bs-toggle="tooltip" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                            <span class="d-none d-md-inline">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div>
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada data detail pesanan</h5>
                                    <p class="text-muted mb-4">Tambahkan data baru dengan mengklik tombol "Tambah Detail Pesanan"</p>
                                    <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if($detailPesanan->count() > 0)
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Total Keseluruhan:</td>
                            <td class="text-end fw-bold text-success">
                                Rp {{ number_format($detailPesanan->sum('subtotal')) }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $detailPesanan->withQueryString()->links('pagination::bootstrap-5') }}
    </div>

    <!-- Info Section -->
    @if($detailPesanan->count() > 0)
    <div class="row mt-4">
        <div class="col">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Total:</strong> {{ $detailPesanan->count() }} detail pesanan ditemukan dengan total keseluruhan
                <strong>Rp {{ number_format($detailPesanan->sum('subtotal')) }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(el => new bootstrap.Tooltip(el));

    // SweetAlert Delete
    const deleteForms = document.querySelectorAll('form[action*="destroy"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then(result => { if(result.isConfirmed) this.submit(); });
        });
    });
});
</script>
@endpush

<style>
.table tbody tr:hover { background-color: rgba(0,123,255,0.02); transition: 0.2s; }
.table th { font-weight:600; text-transform:uppercase; font-size:0.85rem; letter-spacing:0.5px; border-bottom:2px solid #dee2e6; }
.table td { border-bottom:1px solid #f1f1f1; }
.card { border-radius:12px; overflow:hidden; }
.badge { font-weight:500; }
.btn-outline-warning:hover { background-color:#ffc107; border-color:#ffc107; color:#000; }
.btn-outline-danger:hover { background-color:#dc3545; border-color:#dc3545; color:#fff; }
</style>
@endsection
