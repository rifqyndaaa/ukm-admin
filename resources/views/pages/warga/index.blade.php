@extends('layout.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data Warga</h2>
        </div>

        <div class="card-body">

            {{-- TOMBOL TAMBAH --}}
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('Warga.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ================= FILTER & SEARCH ================= --}}
            <form method="GET" action="{{ route('Warga.index') }}" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama warga..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">-- Jenis Kelamin --</option>
                        @foreach($listJenisKelamin as $jk)
                            <option value="{{ $jk }}" {{ request('jenis_kelamin') == $jk ? 'selected' : '' }}>
                                {{ $jk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="agama" class="form-select">
                        <option value="">-- Agama --</option>
                        @foreach($listAgama as $agama)
                            <option value="{{ $agama }}" {{ request('agama') == $agama ? 'selected' : '' }}>
                                {{ $agama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>
            </form>
            {{-- =================================================== --}}

            {{-- ================= CARD WARGA ================= --}}
            <div class="row">
                @forelse($warga as $w)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="mb-0">{{ $w->nama }}</h5>
                                <span class="badge bg-primary">{{ $w->no_ktp }}</span>
                            </div>

                            <p class="mb-1"><strong>JK:</strong> {{ $w->jenis_kelamin }}</p>
                            <p class="mb-1"><strong>Agama:</strong> {{ $w->agama }}</p>
                            <p class="mb-3"><strong>Pekerjaan:</strong> {{ $w->pekerjaan }}</p>

                            <div class="mt-auto d-flex justify-content-end gap-2">
                                <button
                                    class="btn btn-info btn-sm btn-detail"
                                    data-nama="{{ $w->nama }}"
                                    data-ktp="{{ $w->no_ktp }}"
                                    data-jk="{{ $w->jenis_kelamin }}"
                                    data-agama="{{ $w->agama }}"
                                    data-alamat="{{ $w->alamat }}"
                                    data-pekerjaan="{{ $w->pekerjaan }}"
                                    data-telp="{{ $w->telp }}"
                                    data-email="{{ $w->email }}"
                                    data-id="{{ $w->warga_id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <a href="{{ route('Warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Warga.destroy', $w->warga_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Data warga tidak ditemukan
                    </div>
                </div>
                @endforelse
            </div>

            {{-- ================= PAGINATION ================= --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $warga->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

{{-- ================= MODAL DETAIL YANG LEBIH MENARIK ================= --}}
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- HEADER MODAL --}}
            <div class="modal-header bg-gradient-primary text-white">
                <div class="d-flex align-items-center">
                    <div class="bg-white rounded-circle p-2 me-3">
                        <i class="fas fa-user text-primary fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="modal-title mb-0" id="d_nama">Nama Warga</h5>
                        <small class="text-light opacity-75" id="d_ktp">No. KTP</small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            {{-- BODY MODAL --}}
            <div class="modal-body p-4">
                <div class="row">
                    {{-- COLUMN KIRI: DATA PRIBADI --}}
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-id-card me-2"></i>Informasi Pribadi</h6>
                            </div>
                            <div class="card-body">
                                <div class="info-item d-flex mb-3">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-venus-mars"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Jenis Kelamin</small>
                                        <strong id="d_jk">-</strong>
                                    </div>
                                </div>

                                <div class="info-item d-flex mb-3">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-pray"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Agama</small>
                                        <strong id="d_agama">-</strong>
                                    </div>
                                </div>

                                <div class="info-item d-flex">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Pekerjaan</small>
                                        <strong id="d_pekerjaan">-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN KANAN: KONTAK & ALAMAT --}}
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-address-book me-2"></i>Kontak & Alamat</h6>
                            </div>
                            <div class="card-body">
                                <div class="info-item d-flex mb-3">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Alamat</small>
                                        <strong id="d_alamat">-</strong>
                                    </div>
                                </div>

                                <div class="info-item d-flex mb-3">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">No. Telepon</small>
                                        <strong id="d_telp">-</strong>
                                    </div>
                                </div>

                                <div class="info-item d-flex">
                                    <div class="icon-box me-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <strong id="d_email">-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- FOOTER STATS --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="bg-light p-3 rounded">
                            <div class="row text-center">
                                <div class="col-md-3 mb-2 mb-md-0">
                                    <div class="p-2">
                                        <div class="icon-box mx-auto mb-2">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                        <p class="mb-0"><small>Terdaftar</small></p>
                                        <strong>12 Mar 2024</strong>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2 mb-md-0">
                                    <div class="p-2">
                                        <div class="icon-box mx-auto mb-2">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <p class="mb-0"><small>Status</small></p>
                                        <strong>Aktif</strong>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2 mb-md-0">
                                    <div class="p-2">
                                        <div class="icon-box mx-auto mb-2">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <p class="mb-0"><small>Status Tempat Tinggal</small></p>
                                        <strong>Pemilik</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-2">
                                        <div class="icon-box mx-auto mb-2">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <p class="mb-0"><small>Jumlah Keluarga</small></p>
                                        <strong>4 Orang</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER MODAL --}}
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Tutup
                </button>
                <a href="#" class="btn btn-primary" id="editBtn">
                    <i class="fas fa-edit me-1"></i> Edit Data
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT MODAL --}}
<script>
document.querySelectorAll('.btn-detail').forEach(btn => {
    btn.addEventListener('click', function () {
        // Set data ke modal
        document.getElementById('d_nama').textContent = this.dataset.nama;
        document.getElementById('d_ktp').textContent = 'No. KTP: ' + this.dataset.ktp;
        document.getElementById('d_jk').textContent = this.dataset.jk;
        document.getElementById('d_agama').textContent = this.dataset.agama;
        document.getElementById('d_alamat').textContent = this.dataset.alamat;
        document.getElementById('d_pekerjaan').textContent = this.dataset.pekerjaan;
        document.getElementById('d_telp').textContent = this.dataset.telp;
        document.getElementById('d_email').textContent = this.dataset.email;

        // Set URL edit
        const editUrl = "{{ route('Warga.edit', ':id') }}".replace(':id', this.dataset.id);
        document.getElementById('editBtn').href = editUrl;
    });
});

// Tambahkan animasi pada saat modal muncul
document.getElementById('detailModal').addEventListener('shown.bs.modal', function () {
    const items = this.querySelectorAll('.info-item');
    items.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(10px)';
        setTimeout(() => {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>

<style>
.icon-box {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border-radius: 8px;
    color: #6c757d;
}

.info-item {
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 15px;
}

.info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.modal-header {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
}

/* Hover effect untuk info items */
.info-item:hover .icon-box {
    background-color: #e9ecef;
    color: #4e73df;
    transform: scale(1.05);
    transition: all 0.3s ease;
}
</style>

@endsection
